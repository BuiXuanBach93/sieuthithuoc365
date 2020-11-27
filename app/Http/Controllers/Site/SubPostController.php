<?php
/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 10/19/2017
 * Time: 10:25 AM
 */

namespace App\Http\Controllers\Site;


use App\Entity\Input;
use App\Entity\Post;
use App\Entity\TrackingItem;
use App\Entity\TypeSubPost;
use App\Entity\Product;
use App\Ultility\Ultility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SubPostController extends SiteController
{
    public function __construct(){
        parent::__construct();
    }

    public function index(Request $request, $sub_post_slug) {

        $posts = $this->getPosts($sub_post_slug, $request);

        $typeSubPost = $this->getTypeSubPost($sub_post_slug);

        if ($typeSubPost->template == 'default') {
            return view('site.default.sub_post', compact('posts'));
        } else {
            return view('site.template.'.$typeSubPost->template, compact('posts'));
        }
    }

    private function getPosts($sub_post_slug, $request) {
        try {
            $posts = Post::join('sub_post', 'sub_post.post_id', '=', 'posts.post_id')
                ->select('posts.*')
                ->where('type_sub_post_slug', $sub_post_slug);

            if (!empty($request->input('word'))) {
                $posts = $posts->where('slug', 'like', '%'.Ultility::createSlug($request->input('word')).'%');
            }
            $posts = $posts->paginate(2);

            foreach($posts as $id => $post) {
                $inputs = Input::where('post_id', $post->post_id)
                    ->get();
                foreach ($inputs as $input) {
                    $posts[$id][$input->type_input_slug] = $input->content;
                }
            }

            return $posts;
        } catch (\Exception $e) {
            Log::error('http->site->SubPostController->getPosts: lỗi lấy sản phẩm.');

            return null;
        }
    }

    private function getTypeSubPost($sub_post_slug) {
        try {
            $typeSubPost = TypeSubPost::where('slug', $sub_post_slug)->first();

            return $typeSubPost;
        } catch (\Exception $e) {
            Log::error('http->site->SubPostController->getTypeSubPost: lỗi lấy dạng bài viết.');

            return redirect('/');
        }
    }

    public function tags(Request $request) {
        try {

            $tags = $request->input('tags');

            // try{
            //     if($request->sc_product_id > 0 || $request->utm_source =='footer'){
            //         $customerIp = Ultility::get_client_ip(); 
            //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
            //         if($county == 'VN'){
            //             if($request->utm_source == 'footer'){
            //                 TrackingItem::insert([
            //                    'source_product_name' => 'Footer Tags',
            //                    'target_product_name' => "TAG : " . $tags,
            //                    'ip_customer' => $customerIp,
            //                    'type' => 3,
            //                    'created_at' =>   new \DateTime(),
            //                    'updated_at' =>   new \DateTime()
            //                 ]);
            //             }
            //             if($request->sc_product_id > 0){
            //                 $sourceProduct = Product::where('product_id', $request->sc_product_id)->first();
            //                 TrackingItem::insert([
            //                    'source_product_id' => $request->sc_product_id,
            //                    'source_product_name' => $sourceProduct->short_name,
            //                    'target_product_name' => "TAG : " . $tags,
            //                    'ip_customer' => $customerIp,
            //                    'type' => 3,
            //                    'created_at' =>   new \DateTime(),
            //                    'updated_at' =>   new \DateTime()
            //                 ]);
            //             }
            //         } 
            //     }

            // }catch (\Exception $e) {
            //     Log::error('http->site->SubPostController->tags : Lỗi tracking tags');
            // }

            $postIds = Post::select('post_id');

            if (!empty($productIds)) {
                if ($productIds->isEmpty()) {
                    $products =  array();

                    return view('site.default.tags', compact('products', 'subPost'));
                }
                $postIds = $postIds->whereIn('post_id', $productIds);
            }


            $postIds = $postIds->where('tags', 'like', $tags.'%')
                ->orWhere('tags', 'like', '%'.$tags.'%')->get();

            $products = $this->getProducts($postIds, $request, $tags);

            return view('site.default.tags', compact('products', 'subPost'));
        } catch (\Exception $e) {
            $products =  array();

            return view('site.default.tags', compact('products', 'subPost'));
        }
    }

    private function getProducts($postIds, $request , $tags) {
        $postIdSearchs = array();
        foreach ($postIds as $postId) {
            $postIdSearchs[] = $postId->post_id;
        }

        $products = Post::join('products', 'products.post_id', '=', 'posts.post_id')
            ->select(
                'posts.*',
                'products.price',
                'products.product_id',
                'products.discount',
                'products.price_deal',
                'products.deal_end',
                'products.discount_start',
                'products.discount_end',
                'products.popular_tag',
                'products.is_promotion'
            )
            ->whereIn('posts.post_id', $postIdSearchs)
            ->where('visiable', 0);


        if ($request->has('sort')) {
            switch ($request->input('sort')) {
                case 'priceIncrease':
                    $products = $products->orderBy('products.discount', 'asc');
                    $products = $products->orderBy('products.price', 'asc');
                    break;
                case 'priceReduction':
                    $products = $products->orderBy('products.discount', 'desc');
                    $products = $products->orderBy('products.price', 'desc'); break;
                case 'sortName': $products = $products->orderBy('posts.title', 'asc'); break;
            }
        }

        $products = $products->paginate(16);

        foreach ($products as $id => $product) {
            $inputs = Input::where('post_id', $product->post_id)->get();
            foreach ($inputs as $input) {
                $products[$id][$input->type_input_slug] = $input->content;
            }
            // $products[$id]->slug = $products[$id]->slug . "?utm_source=tag&tag=" . str_replace(" ", "+", $tags);
        }

        return $products;
    }
}
