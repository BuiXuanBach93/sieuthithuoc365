<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Entity\Contact;
use App\Entity\Input;
use App\Mail\Mail;
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

class NhaThuocSuMoController extends Controller
{

    public function contactSubmit(Request $request) {
		       
        $contact = new Contact();
        $contact->insert([
            'name' => $request->input('name'),
            'phone' => $request->input('phone'),
            'email' => $request->input('email'),
            'address' => $request->input('address'),
            'message' => $request->input('message'),
			      'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        $notification = new Notification();
           $notification->insert([
               'title' => 'Liên hệ',
               'content' => 'Nhà Thuốc Sumo - Bạn vừa có liên hệ mới',
               'status' => '0',
               'url' => asset('/admin/contact'),
               'created_at' => new \DateTime(),
               'updated_at' => new \DateTime()
           ]);
        $response = [
        	'status' => 200,
        	'message' => 'Cảm ơn bạn đã liên hệ cho chúng tôi, chúng tôi sẽ phản hồi sớm nhất.'
        ];   
		return response() -> json($response);
    }

    public function orderSubmit(Request $request) {
        $token = $request->header('Authorization');
        if($token != 'Basic c3VtbzoxMjM0NTZhQA=='){
          $response = [
            'status' => 401,
            'message' => 'Unauthorized',
          ];
          return response() -> json($response); 
        }   
        try{
            $this->send($request); 
        } catch (\Exception $e) {
          $response = [
            'status' => 400,
            'message' => 'Submit Failed',
            'errorMsg' => $e
          ];
          return response() -> json($response);  
        }
        $response = [
          'status' => 200,
          'message' => 'Submit Order Success'
        ];   
      return response() -> json($response);
    }


    public function send(Request $request){
        try {
           $totalPrice = 0;
           // lấy ra chi phí ship
           $costShip = 30000;
           // hình thức thanh toán
           $methodPayment = 'Thanh toán khi nhận hàng';
           // information customer

          $shipName = $request->input('customerName');
          $shipName = str_replace("<","",$shipName);
          $shipName = str_replace(">","",$shipName);
          $shipName = str_replace(";","",$shipName);  

          $shipEmail = $request->input('customerEmail');
          $shipEmail = str_replace("<","",$shipEmail);
          $shipEmail = str_replace(">","",$shipEmail);
          $shipEmail = str_replace(";","",$shipEmail);  

          $shipPhone = $request->input('customerPhone');
          $shipPhone = str_replace("<","",$shipPhone);
          $shipPhone = str_replace(">","",$shipPhone);
          $shipPhone = str_replace(";","",$shipPhone);   

          $shipAddress = $request->input('customerAddress');
          $shipAddress = str_replace("<","",$shipAddress);
          $shipAddress = str_replace(">","",$shipAddress);
          $shipAddress = str_replace(";","",$shipAddress);  

           $customer = [
               'ship_name' => $shipName,
               'ship_email' => $shipEmail,
               'ship_phone' => $shipPhone,
               'ship_address' => $shipAddress,
           ];
         
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
           
           $order = new Order();
           $orderId = $order->insertGetId([
               'status' => '1', // trang thai đặt hàng thành công
               'order_source' => 7,
               'shipping_name' => $shipName,
               'shipping_email' => $shipEmail,
               'shipping_phone' => $shipPhone,
               'shipping_address' => $shipAddress,
               'total_price' => ($totalPrice + $costShip),
               'method_payment' =>  $methodPayment,
               'customer_ship' => $costShip,
               'ip_customer' => Ultility::get_client_ip(),
               'created_at' =>   new \DateTime(),
               'updated_at' =>   new \DateTime(),
               'user_id' => $userId
           ]);
           $notifyAdmin = new Notification();
           $notifyAdmin->insert([
               'title' => 'Đơn hàng',
               'content' => 'Nhà Thuốc Sumo vừa có đơn hàng mới',
               'status' => '0',
               'url' => route('orderAdmin'),
               'created_at' => new \DateTime(),
               'updated_at' => new \DateTime()
           ]);

          $orderItems = Order::getOrderItemsFromAPI($request->input('orderItems'));

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
                   'currency' => 'vnd',
                   'cost' => $cost,
                   'origin_price' => $orderItem->origin_price,
                   'free_gift' => $orderItem->is_free_gift,
                   'created_at' =>   new \DateTime(),
                   'updated_at' =>   new \DateTime()
               ]);
           }

           // recalculate total price
           $totalPrice = $this->computePrice($orderItems);
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
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('http->site->NhaThuocSuMoController->send: loi gui don hang');
        }

    }

    private function computePrice($orderItems) {
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

}
