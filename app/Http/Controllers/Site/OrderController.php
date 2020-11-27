<?php
/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 11/4/2017
 * Time: 4:40 PM
 */

namespace App\Http\Controllers\Site;


use App\Entity\MailConfig;
use App\Entity\Notification;
use App\Entity\Order;
use App\Entity\OrderBank;
use App\Entity\OrderCodeSale;
use App\Entity\OrderItem;
use App\Entity\CartItem;
use App\Entity\TrackingItem;
use App\Entity\OrderShip;
use App\Entity\Post;
use App\Entity\Product;
use App\Entity\SettingGetfly;
use App\Entity\SettingOrder;
use App\Entity\User;
use App\Ultility\CallApi;
use App\Ultility\Ultility;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use kcfinder\session;
use Validator;

class OrderController extends SiteController
{
    public function __construct(){
        parent::__construct();
    }

    /*===== thanh toán =====*/
   public function order(Request $request, Product $product) {
       try {
           if (Auth::check()) {
               $user = Auth::user();
               $userId = $user->id;
               $point = $user->point;
           } else {
               $point = null;
           }

           $orderShips = OrderShip::get();
           $orderItems = Order::getOrderItems();
           $orderBanks = OrderBank::get();
           //point
           $price = $product->price;
           $price_deal = $product->price_deal;
           $settingOrder = SettingOrder::first();
           $point_price = 0;
           $point_deal = 0;
           if (!empty($settingOrder)) {
               $point_price = $price/$settingOrder->currency_give_point;
               $point_deal = $price_deal/$settingOrder->currency_give_point;
           }
           $hasPromotion = 0;
           $showPromotion = 0;
           foreach($orderItems as $orderItem) {
              if($orderItem->is_promotion == 1 && $orderItem->free_gift_id > 0){
                 $hasPromotion = 1;
                 $orderFreeGiftItem = Order::getOrderFreeGiftItems($orderItem->free_gift_id);
                 if(sizeof($orderFreeGiftItem) > 0){
                    $orderItems[sizeof($orderItems)] = $orderFreeGiftItem[0];
                    if($orderItem->promotion_threshold <= $orderItem->quantity){
                      $showPromotion = 1;
                    }
                    $orderItem->is_promotion = 2;
                 }
                 break;
              }
           }

           return view('site.order.index', compact(
               'orderItems',
               'point',
               'orderShips',
               'orderBanks',
               'point_price',
               'point_deal',
               'hasPromotion',
               'showPromotion'
           ));
       } catch (\Exception $e) {
           return redirect(URL::to('/'));
       }

   }

   /* ===== add to cart ======*/
   public function addToCart(Request $request) {
      try{
         if (empty($request->input('quantity'))
           || empty($request->input('product_id'))
       ) {
           return response('Error', 404)
               ->header('Content-Type', 'text/plain');
       }

       $quantities = $request->input('quantity');
       $productIds = $request->input('product_id');
       $properties = $request->input('properties');

       $this->insertOrder($request, $productIds,$quantities, $properties);
       $orderItems = $this->productAddToCart($request, $productIds);

       foreach($orderItems as $orderItem) {
           if (time() <= strtotime($orderItem->deal_end)) {
               $cost = $orderItem->price_deal;
           } elseif (!empty($orderItem->discount)) {
               $cost = $orderItem->discount;
           } else {
               $cost = $orderItem->price;
           }
           if($request->btnType){
              CartItem::insert([
               'product_id' => $orderItem->product_id,
               'product_name' => $orderItem->short_name,
               'cost' => $cost,
               'ip_customer' => Ultility::get_client_ip(),
               'btn_type' => $request->btnType,
               'created_at' =>   new \DateTime(),
               'updated_at' =>   new \DateTime()
              ]);
           }else{
              CartItem::insert([
                 'product_id' => $orderItem->product_id,
                 'product_name' => $orderItem->short_name,
                 'cost' => $cost,
                 'ip_customer' => Ultility::get_client_ip(),
                 'created_at' =>   new \DateTime(),
                 'updated_at' =>   new \DateTime()
             ]);
           }

          TrackingItem::insert([
             'source_product_id' => $request->sc_product_id,
             'source_product_name' => "SẢN PHẨM : " . $orderItem->short_name,
             'target_product_id' => $orderItem->product_id,
             'target_product_name' => "GIỎ HÀNG : " . $orderItem->short_name,
             'ip_customer' => Ultility::get_client_ip(),
             'type' => 4,
             'created_at' =>   new \DateTime(),
             'updated_at' =>   new \DateTime()
          ]);
            
       }

       return response([
           'status' => 200,
           'orderItems' => $orderItems,
           'quantities' =>  $quantities,
           'properties' => !empty($properties) ? $properties : '',
       ])->header('Content-Type', 'text/plain'); 
      } catch (\Exception $e) {
             Log::error('http->site->OrderController->addToCart: add to cart');

             return redirect('/');
        }
   }


    private function productAddToCart($request, $productIds) {
        $orderItemDetail = Post::join('products', 'products.post_id', '=', 'posts.post_id')
            ->whereIn('products.product_id', $productIds)
            ->get();
        
        return $orderItemDetail;

    }
    private function insertOrder($request, $productIds, $quantities, $properties, $isSend = false) {
        // update order new;
        $orderNew = array();
        $statusUpdate = array();
        foreach($productIds as $id => $productId) {
            $orderNew[$productId]['quantity'] = $quantities[$id];
            $orderNew[$productId]['properties'] = $properties[$id];
            $statusUpdate[$productId] = false;
        }

        if($request->session()->has('orderItems')) {
            $orderItemOlds = $request->session()->pull('orderItems');
            foreach ($orderItemOlds as $orderItemOld) {
                if (isset($orderNew[$orderItemOld['product_id']]) && !$isSend) {
                    $orderItem = [
                        'quantity' => ($orderNew[$orderItemOld['product_id']]['quantity'] + $orderItemOld['quantity']),
                        'product_id' => $orderItemOld['product_id'],
                        'properties' => $orderNew[$orderItemOld['product_id']]['properties']
                    ];
                    $request->session()->push('orderItems', $orderItem);
                    $statusUpdate[$orderItemOld['product_id']] = true;
                    continue;
                }

                $request->session()->push('orderItems', $orderItemOld);
            }
        }


        foreach ($orderNew as $productId => $orderItem) {
            if(!$statusUpdate[$productId]) {
                $orderItem = [
                    'quantity' => $orderItem['quantity'],
                    'product_id' => $productId,
                    'properties' =>  $orderItem['properties']
                ];
                $request->session()->push('orderItems', $orderItem);
            }
        }
    }
   public function deleteItemCart(Request $request) {
       $productId = $request->input('product_id');

       if($request->session()->has('orderItems')) {
           $orderItemOlds = $request->session()->pull('orderItems');

           if(sizeof($orderItemOlds) <= 1){
              foreach ($orderItemOlds as $orderItemOld) { 
                  $request->session()->push('orderItems', $orderItemOld);
              }
              return redirect('/gio-hang');
           }

           foreach ($orderItemOlds as $orderItemOld) { 
               if ($productId != $orderItemOld['product_id']) {
                   $request->session()->push('orderItems', $orderItemOld);
               }
           }
       }

       return redirect('/gio-hang');
   }

   private function computePrice() {
       $orderItems = Order::getOrderItems();

       $totalPrice = 0;
       foreach ($orderItems as $orderItem) {
           if (!empty($orderItem->price_deal) && time() <= strtotime($orderItem->deal_end)) {  
               $totalPrice += $orderItem->price_deal*$orderItem->quantity;
           } elseif (!empty($orderItem->discount)) {
               $totalPrice += $orderItem->discount*$orderItem->quantity;
           } else {
               if($orderItem->price > 0){
                   $totalPrice += $orderItem->price*$orderItem->quantity;
               }else{
                   $totalPrice += $orderItem->hiden_price*$orderItem->quantity;
               }
           }
       }
       return $totalPrice;
   }
   private function getCodeSalePrice(Request $request, $totalPrice) {
       $oldCodeSale = $request->input('code_sale');

       $codeSale = OrderCodeSale::where('code', $oldCodeSale)
           ->where('many_use', '>', 0)
           ->where('start', '<=', new \DateTime())
           ->where('end', '>=', new \DateTime())
           ->first();

       if (empty($codeSale)) {
           return 0;
       }

       if ($codeSale->method_sale == 0) {
           return $codeSale->sale;
       }

       return ($totalPrice*$codeSale->sale)/100;
   }
   private function getPointGive(Request $request) {
       $oldIsUserPoint = $request->input('is_use_point');
       if ($oldIsUserPoint != 1) {
           return 0;
       }
       if (!Auth::check()) {
           return 0;
       }
       $point = Auth::user()->point;
       $settingOrder = SettingOrder::first();

       return $point*$settingOrder->point_to_currency;
   }
   private function getCostShip(Request $request) {
       $oldMethodShip = $request->input('method_ship');
       $orderShip = OrderShip::where('order_ship_id', $oldMethodShip)->first();

       if (empty($orderShip)) {
           return 0;
       }

       return $orderShip->cost;
   }

   public function send(Request $request){
        try {
//           DB::beginTransaction();
            // tính tổng tiền phải trả
            //
       $orderBanks = OrderBank::get();
       $orderShips = OrderShip::get();
           $totalPrice = 0;
           // lấy ra mã giảm giá
          // $codeSalePrice = $this->getCodeSalePrice($request, $totalPrice);
           $codeSalePrice = 0;
           // lấy ra tiền tương ứng với điểm thưởng
          // $pointGive = $this->getPointGive($request);
           $pointGive = 0;
           // lấy ra chi phí ship
           $costShip = $request->input('customer_ship');
           // hình thức thanh toán
           $methodPayment = $request->input('method_payment', '');
           // information customer

          $shipName = $request->input('ship_name');
          $shipName = str_replace("<","",$shipName);
          $shipName = str_replace(">","",$shipName);
          $shipName = str_replace(";","",$shipName);  

          $shipEmail = $request->input('ship_email');
          $shipEmail = str_replace("<","",$shipEmail);
          $shipEmail = str_replace(">","",$shipEmail);
          $shipEmail = str_replace(";","",$shipEmail);  

          $shipPhone = $request->input('ship_phone');
          $shipPhone = str_replace("<","",$shipPhone);
          $shipPhone = str_replace(">","",$shipPhone);
          $shipPhone = str_replace(";","",$shipPhone);   

          $shipAddress = $request->input('ship_address');
          $shipAddress = str_replace("<","",$shipAddress);
          $shipAddress = str_replace(">","",$shipAddress);
          $shipAddress = str_replace(";","",$shipAddress);  

           $customer = [
               'ship_name' => $shipName,
               'ship_email' => $shipEmail,
               'ship_phone' => $shipPhone,
               'ship_address' => $shipAddress,
           ];
           // thêm mới thông tin đơn hàng.
           if(Auth::check()) {
               $userId = Auth::user()->id;
           } else {
               $userModel = new User();
               $userWithPhone = $userModel->where('phone', $shipPhone)
                   ->orWhere('email',  $request->input('ship_address'))->first();

               if (empty($userWithPhone)) {
                   $user = $userModel->create([
                       'name' => $shipName,
                       'email' => empty($request->input('ship_email')) ? $shipPhone : $shipEmail ,
                       'phone' => $shipPhone,
                       'address' => $shipAddress,
                       'password' => bcrypt($request->input('ship_phone')),
                       'role' => 1,
                   ]);

                   $userId = $user->id;
               } else {
                   $userId = $userWithPhone->id;
               }
           }
           $order = new Order();
           $orderId = $order->insertGetId([
               'status' => '1', // trang thai đặt hàng thành công
               'shipping_name' => $shipName,
               'shipping_email' => $shipEmail,
               'shipping_phone' => $shipPhone,
               'shipping_address' => $shipAddress,
               'total_price' => ($totalPrice + $costShip - $codeSalePrice - $pointGive),
               'method_payment' =>  $methodPayment,
               'customer_ship' => $costShip,
               'cost_point' => $pointGive,
               'cost_sale' => $codeSalePrice,
               'ip_customer' => Ultility::get_client_ip(),
               'created_at' =>   new \DateTime(),
               'updated_at' =>   new \DateTime(),
               'user_id' => $userId
           ]);
           $notifyAdmin = new Notification();
           $notifyAdmin->insert([
               'title' => 'Đơn hàng',
               'content' => 'Bạn vừa có đơn hàng mới',
               'status' => '0',
               'url' => route('orderAdmin'),
               'created_at' => new \DateTime(),
               'updated_at' => new \DateTime()
           ]);
           // insert order item
            $quantities = $request->input('quantity');
            $productIds = $request->input('product_id');
            $properties = $request->input('properties');
            $this->insertOrder($request, $productIds,$quantities, $properties, true);
            $orderItems = Order::getOrderItems();

            // populate free gift
            foreach($orderItems as $orderItem) {
              if($orderItem->is_promotion == 1 && $orderItem->free_gift_id > 0 && $orderItem->promotion_threshold <= $orderItem->quantity){
                 $orderFreeGiftItem = Order::getOrderFreeGiftItems($orderItem->free_gift_id);
                 if(sizeof($orderFreeGiftItem) > 0){
                    $orderItems[sizeof($orderItems)] = $orderFreeGiftItem[0];
                 }
                 break;
              }
           }

           $productName = ""; 
           foreach($orderItems as $orderItem) {
               if (time() <= strtotime($orderItem->deal_end)) {
                   $cost = $orderItem->price_deal;
               } elseif (!empty($orderItem->discount)) {
                   $cost = $orderItem->discount;
               } else {
                   if($orderItem->price > 0){
                       $cost = $orderItem->price;
                   }else{
                       $cost = $orderItem->hiden_price;
                   }
                   
               }
               $productName =  $productName . "- " . $orderItem->short_name;
               OrderItem::insert([
                   'product_id' => $orderItem->product_id,
                   'product_name' => $orderItem->short_name,
                   'quantity' => $orderItem->quantity,
                   'order_id' => $orderId,
                   'properties' => $orderItem->properties,
                   'currency' => 'vnd',
                   'cost' => $cost,
                   'origin_price' => $orderItem->origin_price,
                   'free_gift' => $orderItem->is_free_gift,
                   'created_at' =>   new \DateTime(),
                   'updated_at' =>   new \DateTime()
               ]);
           }

           // recalculate total price
           $totalPrice = $this->computePrice();
           if($totalPrice < 500000){
               $totalPrice += $costShip;
           }else{
               $costShip = 0;
           } 
           $orderCurrent = Order::where('order_id', $orderId)->first();
           $orderCurrent->update([
                'total_price' => $totalPrice,
                'customer_ship' => $costShip,
                'product_names'=> $productName
            ]);

           try{
              TrackingItem::insert([
                 'source_product_name' => "GIỎ HÀNG : " . $productName,
                 'target_product_name' => "ĐƠN HÀNG : " . $orderId,
                 'ip_customer' => Ultility::get_client_ip(),
                 'type' => 5,
                 'created_at' =>   new \DateTime(),
                 'updated_at' =>   new \DateTime()
              ]);
            }catch (\Exception $e) {
              // do nothing
            }
            
           // send mail to admin
           // $this->sendMailAdmin();

           // giải phóng session
           $request->session()->pull('orderItems');

           return view('site.order.send', compact(
               'orderId',
               'orderItems',
               'codeSalePrice',
               'pointGive',
               'costShip',
               'totalPrice',
               'customer',
               'orderBanks',
               'methodPayment',
               'orderShips'
           ));
//           DB::commit();

        } catch (\Exception $e) {
            DB::rollback();
             Log::error('http->site->OrderController->send: loi gui don hang');

             return redirect('/');
        }

   }

    private function minusPointUser(Request $request) {
        $oldIsUserPoint = $request->input('is_use_point');
        if ($oldIsUserPoint == 1) {
            $user = Auth::user();
            User::where('id', $user->id)->update([
                'point' => 0
            ]);
        }
    }
    private function minusManyCodeSale(Request $request) {
        $oldCodeSale = $request->session()->get('code_sale');

        $codeSale = OrderCodeSale::where('code', $oldCodeSale)
            ->where('many_use', '>', 0)
            ->where('start', '<=', new \DateTime())
            ->where('end', '>=', new \DateTime())
            ->first();

        if (!empty($codeSale)) {
            $codeSale->update([
                'many_use' => $codeSale->many_use-1
            ]);
        }

    }
    protected function sendMailAdmin() {
       try {
           $subject =  'Đơn hàng mới từ website';
           $content =  'Vừa có đơn hàng mới từ website';

           MailConfig::sendMail('', $subject, $content);
       } catch (\Exception $e) {

       }
    }

    public function trackingCart(Request $request) {
        try{
            $phone = $request->input('phone');
            $productId = $request->input('productId');
            $productName = $request->input('productName');
            $name = $request->input('name');
            


            $customerIp = Ultility::get_client_ip(); 
            TrackingItem::insert([
             'source_product_name' => "GIỎ HÀNG : " . $productName,
             'target_product_name' => "CART INFO : " .$name . " - " . $phone,
             'ip_customer' => $customerIp,
             'type' => 4,
             'created_at' =>   new \DateTime(),
             'updated_at' =>   new \DateTime()
            ]);
            
            $orderDb = new Notification();
           $orderDb->insert([
               'title' => 'Giỏ hàng',
               'content' => 'Khách nhập thông tin giỏ hàng',
               'status' => '0',
               'url' => asset('/admin/tracking-item'),
               'created_at' => new \DateTime(),
               'updated_at' => new \DateTime()
           ]);

            return response([
                'httpCode' => 200
            ])->header('Content-Type', 'text/plain');

        } catch (\Exception $e) {
            Log::error('http->site->OrderController->trackPhone');

            return redirect('/');
        }
    }

    private function postOrderToGetfly($request, $orderItems, $codeSalePrice, $costShip, $totalPrice) {
       try {
           $now = new \DateTime();

           $orderInfor = [
               'account_name' => $request->input('ship_name'),
               'account_address' => $request->input('ship_address'),
               'account_email' => $request->input('ship_email'),
               'account_phone' => $request->input('ship_phone'),
               'order_date' => date_format($now,"d/m/Y"),
               'discount' => 0,
               'discount_amount' => $codeSalePrice,
               'vat' => 0,
               'vat_amount' => 0,
               'transport_amount' => $costShip,
               'installation' => 0,
               'installation_amount' => 0,
               'amount' => $totalPrice,
           ];

           $products = array();
           foreach ($orderItems as $orderItem) {
               $productCode = Product::where('post_id', $orderItem->post_id)->first();
               $products[] = (object) [
                   'product_code' => $productCode->code,
                   'product_name' => $orderItem->title,
                   'quantity' => $orderItem->quantity,
                   'price' =>  $orderItem->price,
                   'product_sale_off' => '',
                   'cash_discount' => ($orderItem->price - $orderItem->discount)
               ];
           }

           $data = (object) [
               'order_info' => $orderInfor,
               'products' => $products,
               'terms' => ['Đơn hàng']
           ];

           $callApi = new CallApi();
           $callApi->postOrder($data);
       } catch (\Exception $e) {
            Log::error('http->site->OrderController->postOrderToGetfly: Lỗi đẩy đơn hàng lên getfly');
       }


    }
}
