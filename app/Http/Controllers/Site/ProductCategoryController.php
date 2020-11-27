<?php
/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 10/19/2017
 * Time: 10:24 AM
 */

namespace App\Http\Controllers\Site;


use App\Entity\Category;
use App\Entity\Input;
use App\Entity\Post;
use App\Entity\Product;
use App\Entity\TrackingItem;
use App\Ultility\Ultility;
use Illuminate\Http\Request;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Log;

class ProductCategoryController extends SiteController
{
    public function __construct(){
        parent::__construct();
    }

    public function index($cate_slug = 'san-pham', Request $request) {
	try{
		// lấy ra bộ lọc
		$filters = $request->input('filter');

		$category = $this->getCategoryDetail($cate_slug);

		$productinfors = $this->getProducts($category, $request, $filters);
		$products = $productinfors['products'];
		$countProduct = $productinfors['countProduct'];

		$productSeen =Product::saveProductSeen($request);

        // try{
                
        //     if($request->utm_source == 'suggestion' && $request->sc_product_id > 0){
        //         $customerIp = Ultility::get_client_ip(); 
        //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
        //         if($county == 'VN'){
        //             $sourceProduct = Product::where('product_id', $request->sc_product_id)->first();
        //             TrackingItem::insert([
        //                'source_product_id' => $request->sc_product_id,
        //                'source_product_name' => $sourceProduct->short_name,
        //                'target_product_id' => $category->category_id,
        //                'target_product_name' => "DANH MỤC : " . $category->title,
        //                'ip_customer' => $customerIp,
        //                'type' => 2,
        //                'created_at' =>   new \DateTime(),
        //                'updated_at' =>   new \DateTime()
        //             ]);
        //         } 
        //     }
        //     elseif($request->utm_source == 'homemenu'){
        //         $customerIp = Ultility::get_client_ip(); 
        //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
        //         if($county == 'VN'){
        //                 TrackingItem::insert([
        //                'source_product_name' => "HOME MENU",
        //                'target_product_id' => $category->category_id,
        //                'target_product_name' => "DANH MỤC : " . $category->title,
        //                'ip_customer' => $customerIp,
        //                'type' => 2,
        //                'created_at' =>   new \DateTime(),
        //                'updated_at' =>   new \DateTime()
        //             ]);    
        //         } 
        //     }
        //     elseif($request->utm_source == 'viewmore'){
        //         $customerIp = Ultility::get_client_ip(); 
        //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
        //         if($county == 'VN'){
        //                 TrackingItem::insert([
        //                'source_product_name' => "HOME VIEW MORE",
        //                'target_product_id' => $category->category_id,
        //                'target_product_name' => "DANH MỤC : " . $category->title,
        //                'ip_customer' => $customerIp,
        //                'type' => 2,
        //                'created_at' =>   new \DateTime(),
        //                'updated_at' =>   new \DateTime()
        //             ]);    
        //         } 
        //     }
        //     elseif($request->utm_source == 'topmenu'){
        //         $customerIp = Ultility::get_client_ip(); 
        //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
        //         if($county == 'VN'){
        //             TrackingItem::insert([
        //              'source_product_name' => "DESKTOP MENU",
        //              'target_product_id' => $category->category_id,
        //              'target_product_name' => "DANH MỤC : " . $category->title,
        //              'ip_customer' => $customerIp,
        //              'type' => 2,
        //              'created_at' =>   new \DateTime(),
        //              'updated_at' =>   new \DateTime()
        //             ]);
        //         }
        //     }
        //     elseif($request->utm_source == 'mobilemenu'){
        //         $customerIp = Ultility::get_client_ip(); 
        //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
        //         if($county == 'VN'){
        //             TrackingItem::insert([
        //              'source_product_name' => "MOBILE LEFT MENU",
        //              'target_product_name' => "DANH MỤC : " . $category->title,
        //              'ip_customer' => $customerIp,
        //              'type' => 2,
        //              'created_at' =>   new \DateTime(),
        //              'updated_at' =>   new \DateTime()
        //             ]);
        //         }
        //     }

        //     if($request->zarsrc){
        //         $customerIp = Ultility::get_client_ip(); 
        //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
        //         if($county == 'VN'){
        //             TrackingItem::insert([
        //                'source_product_name' => 'Zalo',
        //                'target_product_id' => $category->category_id,
        //                'target_product_name' =>"DANH MỤC : " . $category->title,
        //                'ip_customer' => $customerIp,
        //                'type' => 2,
        //                'created_at' =>   new \DateTime(),
        //                'updated_at' =>   new \DateTime()
        //             ]);
        //         }
        //     }
        //     if($request->fbclid){
        //         $customerIp = Ultility::get_client_ip(); 
        //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
        //         if($county == 'VN'){
        //             TrackingItem::insert([
        //                'source_product_name' => 'Facebook',
        //                'target_product_id' => $category->category_id,
        //                'target_product_name' =>"DANH MỤC : " . $category->title,
        //                'ip_customer' => $customerIp,
        //                'type' => 2,
        //                'created_at' =>   new \DateTime(),
        //                'updated_at' =>   new \DateTime()
        //             ]);
        //         }
        //     }
                
            
        // }catch (\Exception $e) {
        //     Log::error('http->site->ProductCategoryController->index : Lỗi tracking category');
        // }

		if ($category->template == 'default' || empty($category->template)) {
		    return view('site.default.category_product', compact('category', 'products', 'productSeen', 'countProduct'));
		} else {
		    return view('site.template.'.$category->template, compact('category', 'products', 'productSeen', 'countProduct'));
		}
	} catch (\Exception $e) {
            Log::error('http->site->ProductCategoryController->index : Lỗi lấy dữ liệu danh mục sản phẩm');

            return redirect('/');
        }    
        
    }

    private function getCategoryDetail($cate_slug) {
        try {
            $categoryModel = new Category();

            $category = $categoryModel->where('slug', $cate_slug)
                ->first();

            $inputs = Input::where('cate_id', $category->category_id)->get();
            foreach ($inputs as $input) {
                $category[$input->type_input_slug] = $input->content;
            }

            return $category;
        } catch (\Exception $e) {
            Log::error('http->site->ProductCategoryController->getCategoryDetail: Lỗi lấy dữ liệu danh mục sản phẩm');

            return redirect('/');
        }
    }

    private function getProducts($category, $request, $filters) {
         try {
            $postModel = new Post();
            $products = $postModel->join('category_post', 'category_post.post_id', '=', 'posts.post_id')
                ->join('products', 'products.post_id', '=', 'posts.post_id')
                ->select(
                    'posts.*',
                    'products.product_id',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.discount_start',
                    'products.discount_end',
                    'products.filter',
                    'products.just_view',
                    'products.popular_tag',
                    'products.is_promotion',
                    'products.code'
                )
                ->where('visiable', 0)
                ->where('category_post.deleted_at','=' , null)
                ->where('category_post.category_id', $category->category_id)
                ->orderBy('posts.post_id', 'desc');

			
			// xử lý phần bộ lọc
            $productFilters  = array();
            $productIdArray = null;
            if (!empty($filters)) {
                foreach ($filters as $id =>  $filter) {
                    $productFilters = Product::select('product_id')
                        ->where('filter', 'like', '%,'.$filter.'%')
                        ->orWhere('filter', 'like', $filter.'%');
						
					if (!empty($productIdArray)) {
                        $productFilters = $productFilters->whereIn('product_id', $productIdArray);
                    }
					
					$productFilters = $productFilters->get();
				
					foreach ($productFilters as $productFilter) {
						$productIdArray[] =  $productFilter->product_id;
					}
                }

                // lay nhung id product thuoc phan bo loc
                $products = $products->whereIn('product_id', $productIdArray);

			}

            if ($request->has('sort')) {
                switch ($request->input('sort')) {
                    case 'priceIncrease': $products = $products->orderBy('products.price', 'asc'); break;
                    case 'priceReduction': $products = $products->orderBy('products.price', 'desc'); break;
                    case 'sortName': $products = $products->orderBy('posts.title', 'asc'); break;
                }
            }

            // tim kiem product
            if (!empty($request->input('word'))) {
                $word = Ultility::createSlug($request->input('word'));
				$arrayWords = explode('-', $word);
				$productSearchs = array();
				foreach ($arrayWords as $id => $word) {
					if ($id == 0) {
						$productSearchs =  $postModel->where('posts.slug', 'like', '%'.$word.'%')
						->orWhere('posts.slug', 'like', $word.'%');
					} else {
						$productSearchs =  $productSearchs->orWhere('posts.slug', 'like', '%'.$word.'%')
						->orWhere('posts.slug', 'like', $word.'%');
					}	
				}
				$productSearchs = $productSearchs->select('post_id')->get();
				$productIdSearch = array();
				foreach ($productSearchs as $productSearch) {
					$productIdSearch[] = $productSearch->post_id;
				}
				
				$products = $products->whereIn('posts.post_id', $productIdSearch);
				
            }
			
            $products = $products->paginate(20);

			// append filter and word after paginage
			if (!empty($filters)) {
				foreach ($filters as $filter) {
					$products->appends(['filter[]' => $filter]);
				}
				
			}
			if (!empty($request->input('word'))) { 
				$products->appends(['word' => $request->input('word')]);
			}
			
            foreach ($products as $id => $product)
            {
                $inputs = Input::where('post_id', $product->post_id)->get();
                foreach ($inputs as $input) {
                    $products[$id][$input->type_input_slug] = $input->content;
                }
                // $products[$id]->slug = $products[$id]->slug . "?utm_source=category" . "&sc_category_id=" . $category->category_id;
            }


            $countProduct = $products->count();

            return [
                'products' => $products,
                'countProduct' => $countProduct
            ];
         } catch (\Exception $e) {
             Log::error('http->site->ProductCategoryController->getProducts: Lỗi lấy dữ liệu sản phẩm');

             return [
                 'products' => array(),
                 'countProduct' => 0
             ];
         }
    }

    public function search(Request $request) {
        $category = $request->input('category');
        $word = $request->input('word');


        $products = $this->getProductsSearch($word);

        $productSeen =Product::saveProductSeen($request);

        try{
            $customerIp = Ultility::get_client_ip(); 
            TrackingItem::insert([
               'source_product_name' => 'SEARCH TEXT : ' . $word,
               'target_product_name' =>"SEARCH PAGE",
               'ip_customer' => $customerIp,
               'type' => 7,
               'created_at' =>   new \DateTime(),
               'updated_at' =>   new \DateTime()
            ]);
            
        }catch (\Exception $e) {
            Log::error('http->site->Search->index : Lỗi tracking category');
        }

        return view('site.default.search', compact('category', 'products', 'productSeen', 'word'));
    }

    private function getProductsSearch($word) {
        try {
            $postModel = new Post();

            $products = $postModel->join('products', 'products.post_id', '=', 'posts.post_id')
                ->select(
                    'posts.*',
                    'products.product_id',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.discount_start',
                    'products.just_view',
                    'products.popular_tag',
                    'products.is_promotion',
                    'products.discount_end'
                )
                ->where('posts.post_type', 'product')
                ->where('posts.slug', 'like', '%'.Ultility::createSlug($word).'%')
                //->orWhere('posts.title', 'like', '%'.$word.'%')
                ->where('visiable', 0)
                ->distinct()
                ->paginate(20);

                // foreach ($products as $id => $product)
                // {
                //     $products[$id]->slug = $products[$id]->slug . "?utm_source=searchpage" . "&search_text=" . str_replace(" ", "+", $word);
                // }

            return $products;
        } catch (\Exception $e) {
            Log::error('http->site->ProductCategoryController->getProductSearch: Lỗi lấy dữ liệu sản phẩm');

            return array();
        }
    }
    public function searchAjax(Request $request) {
        $word = $request->input('word');
        
        if ( empty($word) ) {
            return response('Error', 404)
                ->header('Content-Type', 'text/plain');
        }

        $products = $this->getDetailProductAjax($word);

        return response([
            'status' => 200,
            'products' => $products
        ])->header('Content-Type', 'text/plain');
    }

    private function getDetailProductAjax($word) {
        try {
            $postModel = new Post();

            $products = $postModel->join('products', 'products.post_id', '=', 'posts.post_id')
                ->select(
                    'posts.*',
                    'products.product_id',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.discount_start',
                    'products.discount_end',
                    'products.popular_tag',
                    'products.is_promotion'
                )
                ->where('posts.slug', 'like', '%'.Ultility::createSlug($word).'%')
                ->offset(0)
                ->limit(5)->get();

            return $products;
        } catch (\Exception $e) {
            Log::error('http->site->ProductCategoryController->getDetailProductAjax: Lỗi khi lấy dữ liệu search enjin');

            return array();
        }
    }
	
  public function searchBrand(Request $request) {
        $brandName = $request->input('brandname');

        $products = $this->getBrandProduct($brandName);

        return view('site.default.search_brand', compact('products'));
    }

    private function getBrandProduct($brandName) {
        try {
            $postModel = new Post();

            $products = $postModel->join('products', 'products.post_id', '=', 'posts.post_id')
                ->select(
                    'posts.*',
                    'products.product_id',
                    'products.price',
                    'products.discount',
                    'products.price_deal',
                    'products.discount_start',
                    'products.just_view',
                    'products.popular_tag',
                    'products.is_promotion',
                    'products.discount_end',
                    'products.is_promotion'
                )
                ->where('posts.post_type', 'product')
                ->where('visiable', 0)
                ->where('products.brand_name', 'like', '%'.$brandName.'%')
                ->distinct()
                ->paginate(20);

            return $products;
        } catch (\Exception $e) {
            Log::error('http->site->ProductCategoryController->getBrandProduct: Lỗi lấy dữ liệu sản phẩm');

            return array();
        }
    }

    public function getNotificationData(Request $request) {
        $cateId = $request->input('cateId');
        $productId = $request->input('productId');
        $notifications = $this->getCustomerNotifications($cateId, $productId);

        if (!$notifications) {
            return response([
                'httpCode' => 500,
            ])->header('Content-Type', 'text/plain');
        }

        return response([
            'httpCode' => 200,
            'notifications' => $notifications
        ])->header('Content-Type', 'text/plain');

    }


  private function getCustomerNotifications($cateId, $productId) {
        try {
            $postModel = new Post();

            $notify = $postModel->select(
                    'posts.title',
                    'posts.content',
                    'posts.image'
                )->where('posts.post_type', 'customer-notify')->where('posts.title','like', '%product_'.$productId)->get();
            if(sizeof($notify) <= 0){
                $notify = $postModel->select(
                    'posts.title',
                    'posts.content',
                    'posts.image'
                )->where('posts.post_type', 'customer-notify')->where('posts.title','like', 'cate_'.$cateId.'_%')->inRandomOrder()->limit(10)->get();
            }
            if(sizeof($notify) <= 0){
                $notify = $postModel->select(
                    'posts.title',
                    'posts.content',
                    'posts.image'
                )->where('posts.post_type', 'customer-notify')->inRandomOrder()->limit(10)->get();
            }

            return $notify;
        } catch (\Exception $e) {
            Log::error('http->site->ProductController->getCustomerNotifications: Lỗi lấy dữ liệu sản phẩm');

            return array();
        }
    }	
}
