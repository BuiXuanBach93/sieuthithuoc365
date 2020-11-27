<?php
/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 10/19/2017
 * Time: 10:23 AM
 */

namespace App\Http\Controllers\Site;


use App\Entity\Category;
use App\Entity\Input;
use App\Entity\Post;
use App\Entity\Product;
use App\Entity\SettingOrder;
use App\Entity\User;
use App\Entity\TrackingItem;
use App\Ultility\Ultility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class ProductController extends SiteController
{
    public function __construct(){
        parent::__construct();
    }

    public function index($slug_post, Request $request) {
        try {
            $product = $this->getProduct($slug_post);
            // $averageRating = $product->avgRating;
            // $sumRating = $product->countPositive;

            $category = $this->getFirstCategory($product);

            $showShip = 1;
            if($product->price <= 0 || $product->just_view == 1){
                $showShip = 0;
            }
            $shipText = "(Miễn phí vận chuyển)";
            if($product->discount <= 0){
                if($product->price > 0 && $product->price < 500000){
                    $count = floor(500000/$product->price);
                    if($count * $product->price < 500000){
                       $count += 1;     
                    }
                    $shipText = "(Mua ".$count." hộp free ship)";
                }
            }else{
                if($product->discount < 500000){
                    $count = floor(500000/$product->discount);
                    if($count * $product->discount < 500000){
                       $count += 1;     
                    }
                    $shipText = "(Mua ".$count." hộp miễn phí ship)";
                }
            }

            // tracking product
            // try{
            //     if($request->utm_source){
            //             $customerIp = Ultility::get_client_ip(); 
            //             $county = Ultility::getIpInfo($customerIp,'country_code'); 
            //             if($county == 'VN'){
            //                 if($request->utm_source == 'suggestion' && $request->sc_product_id > 0){
            //                     $sourceProduct = Product::where('product_id', $request->sc_product_id)->first();
            //                     TrackingItem::insert([
            //                        'source_product_id' => $request->sc_product_id,
            //                        'source_product_name' => "SẢN PHẨM : " .$sourceProduct->short_name,
            //                        'target_product_id' => $product->product_id,
            //                        'target_product_name' => "SẢN PHẨM : " . $product->short_name,
            //                        'ip_customer' => $customerIp,
            //                        'type' => 1,
            //                        'created_at' =>   new \DateTime(),
            //                        'updated_at' =>   new \DateTime()
            //                     ]);
            //                 }

            //                 elseif($request->utm_source == 'category' && $request->sc_category_id > 0){
            //                     $sourceCategory = Category::where('category_id', $request->sc_category_id)->first();
            //                     TrackingItem::insert([
            //                        'source_product_id' => $sourceCategory->category_id,
            //                        'source_product_name' => "DANH MỤC : ". $sourceCategory->title,
            //                        'target_product_id' => $product->product_id,
            //                        'target_product_name' => "SẢN PHẨM : " . $product->short_name,
            //                        'ip_customer' =>  $customerIp,
            //                        'type' => 1,
            //                        'created_at' =>   new \DateTime(),
            //                        'updated_at' =>   new \DateTime()
            //                     ]);
            //                 }

            //                 elseif($request->utm_source == 'tag' && $request->tag){
            //                     TrackingItem::insert([
            //                        'source_product_name' => "TAG : ". $request->tag,
            //                        'target_product_id' => $product->product_id,
            //                        'target_product_name' => "SẢN PHẨM : " . $product->short_name,
            //                        'ip_customer' =>  $customerIp,
            //                        'type' => 1,
            //                        'created_at' =>   new \DateTime(),
            //                        'updated_at' =>   new \DateTime()
            //                     ]);
            //                 }

            //                 elseif($request->utm_source == 'homepage'){
            //                     TrackingItem::insert([
            //                        'source_product_name' => "HOME PAGE",
            //                        'target_product_id' => $product->product_id,
            //                        'target_product_name' => "SẢN PHẨM : " . $product->short_name,
            //                        'ip_customer' =>  $customerIp,
            //                        'type' => 1,
            //                        'created_at' =>   new \DateTime(),
            //                        'updated_at' =>   new \DateTime()
            //                     ]);
            //                 }

            //                 elseif($request->utm_source == 'searchpage'){
            //                     TrackingItem::insert([
            //                        'source_product_name' => "SEARCH PAGE : " . $request->search_text,
            //                        'target_product_id' => $product->product_id,
            //                        'target_product_name' => "SẢN PHẨM : " . $product->short_name,
            //                        'ip_customer' =>  $customerIp,
            //                        'type' => 1,
            //                        'created_at' =>   new \DateTime(),
            //                        'updated_at' =>   new \DateTime()
            //                     ]);
            //                 }

            //                 elseif($request->utm_source == 'campaignhome'){
            //                     TrackingItem::insert([
            //                        'source_product_name' => "CAMPAIGN HOME",
            //                        'target_product_id' => $product->product_id,
            //                        'target_product_name' => "SẢN PHẨM : " . $product->short_name,
            //                        'ip_customer' =>  $customerIp,
            //                        'type' => 1,
            //                        'created_at' =>   new \DateTime(),
            //                        'updated_at' =>   new \DateTime()
            //                     ]);
            //                 }
            //                 elseif($request->utm_source == 'campaigncate'){
            //                     TrackingItem::insert([
            //                        'source_product_name' => "CAMPAIGN CATE",
            //                        'target_product_id' => $product->product_id,
            //                        'target_product_name' => "SẢN PHẨM : " . $product->short_name,
            //                        'ip_customer' =>  $customerIp,
            //                        'type' => 1,
            //                        'created_at' =>   new \DateTime(),
            //                        'updated_at' =>   new \DateTime()
            //                     ]);
            //                 }
            //                 elseif($request->utm_source == 'campaigndetail'){
            //                     TrackingItem::insert([
            //                        'source_product_name' => "CAMPAIGN DETAIL",
            //                        'target_product_id' => $product->product_id,
            //                        'target_product_name' => "SẢN PHẨM : " . $product->short_name,
            //                        'ip_customer' =>  $customerIp,
            //                        'type' => 1,
            //                        'created_at' =>   new \DateTime(),
            //                        'updated_at' =>   new \DateTime()
            //                     ]);
            //                 }
            //                 elseif($request->utm_source == 'bannerads'){
            //                     TrackingItem::insert([
            //                        'source_product_name' => "BANNER ADS",
            //                        'target_product_id' => $product->product_id,
            //                        'target_product_name' => "SẢN PHẨM : " . $product->short_name,
            //                        'ip_customer' =>  $customerIp,
            //                        'type' => 1,
            //                        'created_at' =>   new \DateTime(),
            //                        'updated_at' =>   new \DateTime()
            //                     ]);
            //                 }
            //             }
            //     }
                

            //     if($request->zarsrc){
            //         $customerIp = Ultility::get_client_ip(); 
            //             $county = Ultility::getIpInfo($customerIp,'country_code'); 
            //             if($county == 'VN'){
            //                 TrackingItem::insert([
            //                    'source_product_name' => 'Zalo',
            //                    'target_product_id' => $product->product_id,
            //                    'target_product_name' =>"SẢN PHẨM : " .  $product->short_name,
            //                    'ip_customer' =>  $customerIp,
            //                    'type' => 1,
            //                    'created_at' =>   new \DateTime(),
            //                    'updated_at' =>   new \DateTime()
            //                 ]);
            //             }
                    
            //     }
            //     if($request->fbclid){
            //         $customerIp = Ultility::get_client_ip(); 
            //             $county = Ultility::getIpInfo($customerIp,'country_code'); 
            //             if($county == 'VN'){
            //                 TrackingItem::insert([
            //                    'source_product_name' => 'Facebook',
            //                    'target_product_id' => $product->product_id,
            //                    'target_product_name' => "SẢN PHẨM : " . $product->short_name,
            //                    'ip_customer' =>  $customerIp,
            //                    'type' => 1,
            //                    'created_at' =>   new \DateTime(),
            //                    'updated_at' =>   new \DateTime()
            //                 ]);
            //             }
                    
            //     }
                
            // }catch (\Exception $e) {
            //     Log::error('http->site->ProductController->index : Lỗi tracking product');
            // } 

            // product seen
            //$productSeen = Product::saveProductSeen($request, $product);
            // //point
            // $inforPoint = $this->getPoint($product);
            // $point_price = $inforPoint['pointPrice'];
            // $point_deal = $inforPoint['point_detal'];
            // $campaigns = null;
            // if($product->just_view == 1){
            //     $campaigns = $this->getCustomerNotifications();
            // }
            
            return view('site.default.product', compact('product', 'category','campaigns','showShip','shipText'));
            
        } catch (\Exception $e) {
            Log::error('http->site->ProductController->index: loi lay san pham');
            return redirect('/');
        }
    }

    private function getProduct ($slug_post) {
        try {
            $product = Post::join('products', 'products.post_id','=', 'posts.post_id')
                ->select(
                    'products.price',
                    'products.image_list',
                    'products.discount',
                    'products.price_deal',
                    'products.deal_end',
                    'products.code',
                    'products.product_id',
                    'products.properties',
                    'products.buy_together',
                    'products.buy_after',
                    'products.discount_start',
                    'products.discount_end',
                    'products.just_view',
                    'products.available',
                    'products.popular_tag',
                    'products.is_promotion',
                    'products.brand_name',
                    'products.short_name',
                    'products.is_promotion',
                    'products.promotion_content',
                    'products.canonical_link',
                    'posts.*'
                )
                ->where('post_type', 'product')
                ->where('visiable', 0)
                ->where('posts.slug', $slug_post)->first();

            $inputs = Input::where('post_id', $product->post_id)->get();
            foreach ($inputs as $input) {
                $product[$input->type_input_slug] = $input->content;
            }

            return $product;
        } catch (\Exception $e) {
            Log::error('http->site->ProductController->getProduct: lỗi lấy dữ liệu sản phẩm');

            return redirect('/');
        }
    }

    private function getCategories ($product) {
        try {
            $categories = Category::join('category_post', 'categories.category_id', '=', 'category_post.category_id')
                ->select('categories.*')
                ->where('category_post.post_id', $product->post_id)->get();

            return $categories;
        } catch(\Exception $e) {
            Log::error('http->site->ProductController->getCategories: lỗi lấy dữ liệu danh mục');
            return null;
        }
    }
    
   private function getFirstCategory($product) {
        try {
            $category = Category::join('category_post', 'categories.category_id', '=', 'category_post.category_id')
                ->select('categories.*')
                ->where('category_post.post_id', $product->post_id)
                ->where('category_post.deleted_at', null)
                ->where('categories.parent','!=' , 0)
                ->where('categories.slug','!=' , 'san-pham')
                ->first();

            if (empty($category)) {
                $category = Category::first();
            }

            return $category;
        } catch (\Exception $e) {
            Log::error('http->site->PostController->getFirstCategory: lỗi lấy dữ liệu getFirstCategory');

            return redirect('/');
        }
    }

    private function getPoint($product) {
        try {
            $price = $product->price;
            $price_deal = $product->price_deal;

            $settingOrder = SettingOrder::first();
            if (!empty($settingOrder)) {
                $point_price = $price/$settingOrder->currency_give_point;
                $point_deal = $price_deal/$settingOrder->currency_give_point;
            } else {
                $point_price = 0;
                $point_deal = 0;
            }

            return [
                'pointPrice' => $point_price,
                'point_detal' => $point_deal
            ];

        } catch (\Exception $e) {
            Log::error('http->site->ProductController ->getPoint');

            return [
                'pointPrice' => 0,
                'point_detal' => 0
            ];
        }
    }
    public function Rating(Request $request){
        $postId = $request->input('postid');
        $rating = $request->input('rating');

        $post = Post::where('post_id', $postId)->first();
        $post->id = $post->post_id;
        $user = User::first();
        $rating = $post->rating([
            'rating' => $rating
        ], $user);
        $averageRating = $post->avgRating;
        $return_arr = array("averageRating"=>$averageRating);

        return response()->json($return_arr);
    }

    public function demoProduct($slug_post, Request $request) {
        try {

            $product = $this->getProduct($slug_post);
            $averageRating = $product->avgRating;
            $sumRating = $product->countPositive;

            $categories = $this->getCategories($product);

            // product seen
            $productSeen = Product::saveProductSeen($request, $product);
            //point
            $inforPoint = $this->getPoint($product);
            $point_price = $inforPoint['pointPrice'];
            $point_deal = $inforPoint['point_detal'];

            return view('site.template.show-product', compact('product', 'categories', 'productSeen', 'averageRating', 'sumRating', 'point_price','point_deal'));
        } catch (\Exception $e) {
            Log::error('http->site->ProductController->index: loi lay san pham');
            return redirect('/');
        }
    }

    public function getCampaignData(Request $request) {
        $campaigns = $this->getCampaigns();

        if (!$campaigns) {
            return response([
                'httpCode' => 500,
            ])->header('Content-Type', 'text/plain');
        }

        return response([
            'httpCode' => 200,
            'campaigns' => $campaigns
        ])->header('Content-Type', 'text/plain');

    }

    private function getCampaigns() {
        try {
            $postModel = new Post();

            $notify = $postModel->select(
                    'posts.post_id',
                    'posts.content'
                )->where('posts.post_type', 'product-campaign')
                ->where('posts.description', 'active')
                ->orderBy('post_id', 'desc')->get();

            return $notify;
        } catch (\Exception $e) {
            Log::error('http->site->ProductController->getCampaigns: Lỗi lấy dữ liệu campaign');

            return array();
        }
    }

    public function getBannerAdsData(Request $request) {
        $cateId = $request->input('cateId');
        if($cateId == null){
            $cateId = "0";
        }
        $bannerAds = $this->getBannerAds($cateId);

        if (!$bannerAds) {
            return response([
                'httpCode' => 500,
            ])->header('Content-Type', 'text/plain');
        }

        return response([
            'httpCode' => 200,
            'bannerAds' => $bannerAds
        ])->header('Content-Type', 'text/plain');

    }

    private function getBannerAds($cateId) {
        try {
            $postModel = new Post();

            $notify = $postModel->select(
                    'posts.post_id',
                    'posts.title',
                    'posts.description',
                    'posts.image',
                    'posts.content',
                    'posts.additional_data')
                ->where('posts.post_type', 'banner-ads')
                ->where('posts.description', 'active')
                ->where('posts.additional_data','<>',$cateId)
                ->orderBy('post_id', 'desc')->get();

            return $notify;
        } catch (\Exception $e) {
            Log::error('http->site->ProductController->getBannerAds: Lỗi lấy dữ liệu banner ads');

            return array();
        }
    }    
}
