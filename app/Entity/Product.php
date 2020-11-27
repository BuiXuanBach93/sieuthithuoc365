<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class Product extends Model
{
    use SoftDeletes;

    protected $softDelete = true;

    protected $dates = ['deleted_at'];

    protected $table = 'products';

    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_id',
        'code',
        'post_id',
        'price',
        'discount',
        'price_deal',
        'deal_end',
        'origin_price',
    	'hiden_price',
        'discount_start',
        'discount_end',
        'image_list',
        'filter',
        'properties',
        'buy_together',
        'deleted_at',
        'buy_after',
        'priority',
        'just_view',
        'available',
        'ats',
        'expired_date',
        'is_promotion',
        'promotion_content',
        'promotion_threshold',
        'free_gift_id',
        'is_free_gift',
        'short_name',
        'popular_tag',
        'brand_name',
        'canonical_link',
        'created_by',
        'created_at'
    ];

    public static function getAllProduct() {
        try {
            $postModel = new Post();
			parent::boot();
			
            $products = $postModel->where('posts.post_type', 'product')
                ->join('products', 'products.post_id', '=', 'posts.post_id')
                ->select(
                    'posts.*',
                    'products.price',
                    'products.code',
                    'products.price_deal',
                    'products.discount_start',
                    'products.just_view',
                    'products.discount_end',
                    'products.popular_tag',
                    'products.is_promotion'
                )
                ->where('visiable', 0)
				->distinct()
                ->get();
				
			foreach ($products as $id => $product) {
                $inputs = Input::where('post_id', $product->post_id)->get();
                foreach ($inputs as $input) {
                    $products[$id][$input->type_input_slug] = $input->content;
                }
            }	
			
			return $products;
        } catch (\Exception $e) {
            Log::error('Entity->Product->getAllProduct: Lấy tất cả sản phẩm');

            return array();
        }
    }

    public static function showProduct($slug, $countPost = 5) {
        try {
			$postModel =  new Post();
			
            $products =  $postModel::where('posts.post_type', 'product')
                ->join('category_post', 'posts.post_id', '=', 'category_post.post_id')
                ->join('categories', 'category_post.category_id', '=', 'categories.category_id')
                ->join('products', 'products.post_id', '=', 'posts.post_id')
                ->where('categories.slug', $slug)
                ->select(
                    'posts.*',
                    'products.product_id',
                    'products.code',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.discount_start',
                    'products.discount_end',
                    'products.price_deal',
                    'products.deal_end',
                    'products.just_view',
                    'products.properties',
                    'products.priority',
                    'products.short_name',
                    'products.popular_tag',
                    'products.brand_name',
                    'products.ats',
                    'products.expired_date',
                    'products.is_promotion',
                    'products.promotion_content'
                )
                ->where('visiable', 0)
                ->orderBy('products.priority', 'desc')
                ->orderBy('posts.post_id', 'desc')
                ->offset(0)
				->where('category_post.deleted_at', null)
                ->limit($countPost)->distinct()->get();

            foreach ($products as $id => $product) {
                $inputs = Input::where('post_id', $product->post_id)->get();
                foreach ($inputs as $input) {
                    $products[$id][$input->type_input_slug] = $input->content;
                }
                //$products[$id]->slug = $products[$id]->slug."?utm_source=homepage";
            }

            return $products;
        } catch (\Exception $e) {
            Log::error('Entity->Product->showProduct: Hiển thị sản phẩm');

            return array();
        }

    }

    public static function showProductByCreated($slug, $countPost = 5) {
        try {
            $postModel =  new Post();
            
            $products =  $postModel::where('posts.post_type', 'product')
                ->join('category_post', 'posts.post_id', '=', 'category_post.post_id')
                ->join('categories', 'category_post.category_id', '=', 'categories.category_id')
                ->join('products', 'products.post_id', '=', 'posts.post_id')
                ->where('categories.slug', $slug)
                ->select(
                    'posts.*',
                    'products.product_id',
                    'products.code',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.discount_start',
                    'products.discount_end',
                    'products.price_deal',
                    'products.deal_end',
                    'products.just_view',
                    'products.properties',
                    'products.priority',
                    'products.short_name',
                    'products.popular_tag',
                    'products.brand_name',
                    'products.just_view',
                    'products.is_promotion',
                    'products.promotion_content'
                )
                ->where('visiable', 0)
                ->where('just_view', 0)
                ->orderBy('posts.post_id', 'desc')
                ->offset(0)
                ->where('category_post.deleted_at', null)
                ->limit($countPost)->distinct()->get();

            foreach ($products as $id => $product) {
                $inputs = Input::where('post_id', $product->post_id)->get();
                foreach ($inputs as $input) {
                    $products[$id][$input->type_input_slug] = $input->content;
                }
            }

            return $products;
        } catch (\Exception $e) {
            Log::error('Entity->Product->showProduct: Hiển thị sản phẩm');

            return array();
        }

    }

    public static function newProduct($countPost = 5) {
        try {
            $postModel = new Post();

            return $postModel->where('posts.post_type', 'product')
                ->join('products', 'products.post_id', '=', 'posts.post_id')
                ->select(
                    'posts.title',
                    'posts.description',
                    'posts.image',
                    'posts.slug',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.discount_start',
                    'products.discount_end',
                    'products.properties'
                )
                ->where('visiable', 0)
                ->orderBy('posts.post_id', 'desc')
                ->offset(0)
                ->limit($countPost)->get();
        } catch (\Exception $e) {
            Log::error('Entity->Product->showProduct: Hiển thị sản phẩm mới');

            return array();
        }

    }

    public static function detailProduct($slug) {
        try {
            $postModel = new Post();
            $inputModel = new Input();

            $post = $postModel->where('posts.post_type', 'product')
                ->join('products', 'products.post_id', '=', 'posts.post_id')
                ->where('posts.slug', $slug)
                ->where('visiable', 0)
                ->select(
                    'posts.post_id',
                    'posts.title',
                    'posts.description',
                    'posts.image',
                    'posts.slug',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.discount_start',
                    'products.discount_end',
                    'products.just_view',
                    'products.priority',
                    'products.product_id',
                    'products.short_name',
                    'products.popular_tag',
                    'products.brand_name',
                    'products.ats',
                    'products.expired_date',
                    'products.is_promotion',
                    'products.promotion_content'
                )
                ->first();
            $inputs = $inputModel->where('post_id', $post->post_id)->get();
            foreach ($inputs as $input) {
                $post[$input->type_input_slug] = $input->content;
            }

            return $post;
        } catch (\Exception $e) {
            Log::error('Entity->Product->showProduct: Hiển thị chi tiết sản phẩm');

            return null;
        }
    }

    public static function relativeProduct($slug, $productId, $countProduct=4) {
        try {
            $postModel = new Post();
            $inputModel = new Input();

            $categoriesDB = $postModel->where('posts.post_type', 'product')
                ->join('category_post', 'posts.post_id', '=', 'category_post.post_id')
                ->join('categories', 'category_post.category_id', '=', 'categories.category_id')
                ->join('products', 'products.post_id', '=', 'posts.post_id')
                ->where('posts.slug', $slug)
                ->where('visiable', 0)
                ->where('category_post.deleted_at', null)
				->where('categories.parent','!=' , 0)
				->where('categories.slug','!=' , 'san-pham-moi')
				->inRandomOrder()
                ->select(
                    'categories.category_id',
                    'categories.title',
                    'categories.slug',
                    'categories.just_view'
                )
                ->distinct()->get();
			
            $categories = array();
            $justViewCateId = 0;
            foreach($categoriesDB as $category) {
                // bỏ qua cate đại trà
                if($category->just_view == 0){
                    $categories[] =  $category->category_id; 
                }else{
                    $justViewCateId = $category->category_id;
                    break;
                }
            }
			if(sizeof($categories) <= 0){

                // lấy sản phẩm trọng điểm thuộc các cate khác với priority cao nhất
                $products =  $postModel->where('posts.post_type', 'product')
                ->leftJoin('products', 'products.post_id', '=', 'posts.post_id')
                ->select(
                    'posts.*',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.deal_end',
                    'products.discount_start',
                    'products.discount_end',
                    'products.just_view',
                    'products.product_id',
                    'products.popular_tag',
                    'products.brand_name',
                    'products.is_promotion'
                )
                ->where('products.product_id', '!=', $productId)
                ->where('visiable', 0)
                ->where('products.just_view', 0)
                ->orderBy('products.priority', 'desc')
                ->orderBy('posts.post_id', 'desc')
                ->offset(0)
                ->limit($countProduct)->distinct()->get();

                foreach ($products as $id => $product) {
                    $products[$id]['cate_title'] = 'SẢN PHẨM BÁN CHẠY';
                    $products[$id]['cate_slug'] = 'san-pham';
                    // $products[$id]['cate_slug'] = 'san-pham' . "?utm_source=suggestion&sc_product_id=" . $productId;
                    $products[$id]['category_id'] = $justViewCateId;
                    // $products[$id]['slug'] = $products[$id]['slug'] . "?utm_source=suggestion&sc_product_id=" . $productId;
                }
                return $products;

            }else{
                $products =  $postModel->where('posts.post_type', 'product')
                ->leftJoin('category_post', 'posts.post_id', '=', 'category_post.post_id')
                ->leftJoin('categories', 'category_post.category_id', '=', 'categories.category_id')
                ->leftJoin('products', 'products.post_id', '=', 'posts.post_id')
                ->whereIn('categories.category_id', $categories)
                ->select(
                    'posts.*',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.deal_end',
                    'products.discount_start',
                    'products.discount_end',
                    'products.just_view',
                    'products.product_id',
                    'products.popular_tag',
                    'products.is_promotion',
                    'products.brand_name',
                    'categories.category_id'
                )
                ->where('category_post.deleted_at', null)
                ->where('products.product_id', '!=', $productId)
                ->where('visiable', 0)
                ->where('products.just_view', 0)
                ->orderBy('products.priority', 'desc')
                ->orderBy('posts.post_id', 'desc')
                ->offset(0)
                ->limit($countProduct)->distinct()->get();

                foreach ($products as $id => $product) {
                    $products[$id]['cate_title'] = $categoriesDB[0]->title;
                    $products[$id]['cate_slug'] = $categoriesDB[0]->slug;
                    // $products[$id]['cate_slug'] = $categoriesDB[0]->slug . "?utm_source=suggestion&sc_product_id=" . $productId;
                    // $products[$id]['slug'] = $products[$id]['slug'] . "?utm_source=suggestion&sc_product_id=" . $productId;
                }
                return $products;
            }
            
        } catch (\Exception $e) {
            Log::error('Entity->Product->relativeProduct: Hiển thị sản phẩm liên quan');

            return array();
        }

    }

    public static function showProductWithMenu ($slug, $countProduct =6) {
        try {
            $menuElementModel = new MenuElement();
            $postModel = new Post();

            $menus = $menuElementModel->showMenuElement($slug);
            $cateSlug = array();
            foreach ($menus as $menu) {
                $urls = explode('/', $menu->url);
                if(isset($urls[2])) {
                    $cateSlug[] = $urls[2];
                }
            }

            return $postModel->where('posts.post_type', 'product')
                ->join('category_post', 'posts.post_id', '=', 'category_post.post_id')
                ->join('categories', 'category_post.category_id', '=', 'categories.category_id')
                ->join('products', 'products.post_id', '=', 'posts.post_id')
                ->whereIn('categories.slug', $cateSlug)
                ->select(
                    'posts.title',
                    'posts.description',
                    'posts.image',
                    'posts.slug',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.deal_end',
                    'products.discount_start',
                    'products.discount_end',
                    'products.just_view',
                    'products.product_id',
                    'products.popular_tag',
                    'products.is_promotion',
                    'products.brand_name'
                )
                ->where('posts.visiable', 0)
                ->distinct()
                ->offset(0)
                ->limit($countProduct)->distinct()->get();
        } catch (\Exception $e) {
            Log::error('Entity->Product->showProductWithMenu: Hiển thị sản phẩm với menu');

            return array();
        }
    }

    public static function saveProductSeen($request, $product = null) {
        try {
            $seenProducts = null;
            if ($request->session()->has('productReaded')) {
                $seenProducts = $request->session()->get('productReaded');
                foreach ($seenProducts as $pSeen) {
                    if (!empty($product) && ($pSeen->product_id == $product->product_id) ) {
                        return $seenProducts;
                    }
                }

            }

            if(!empty($product)) {
                $request->session()->push('productReaded', $product);
            }

            return $request->session()->get('productReaded');
        } catch (\Exception $e) {
            Log::error('Entity->Product->saveProductSeen: Lưu sản phẩm đã xem');

            return null;
        }
    }

    public static function showHotDeal($slug, $countPost) {
        try {
            $postModel = new Post();

            return $postModel->where('posts.post_type', 'product')
                ->join('category_post', 'posts.post_id', '=', 'category_post.post_id')
                ->join('categories', 'category_post.category_id', '=', 'categories.category_id')
                ->join('products', 'products.post_id', '=', 'posts.post_id')
                ->where('categories.slug', $slug)
                ->where('products.discount_start', '<', new \Datetime())
                ->where('products.discount_end', '>', new \Datetime())
                ->select(
                    'posts.*',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.deal_end',
                    'products.discount_start',
                    'products.discount_end',
                    'products.popular_tag',
                    'products.is_promotion'
                )
                ->where('visiable', 0)
                ->offset(0)
                ->limit($countPost)->distinct()->get();
        } catch(\Exception $e) {
            Log::error('Entity->Product->showHotDeal: Lưu sản phẩm hotdeal');

            return array();
        }

    }
}
