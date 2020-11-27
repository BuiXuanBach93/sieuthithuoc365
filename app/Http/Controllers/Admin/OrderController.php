<?php
/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 11/3/2017
 * Time: 3:05 PM
 */

namespace App\Http\Controllers\Admin;


use App\Entity\Input;
use App\Entity\MailConfig;
use App\Entity\Order;
use App\Entity\OrderBank;
use App\Entity\OrderCodeSale;
use App\Entity\OrderItem;
use App\Entity\OrderShip;
use App\Entity\Post;
use App\Entity\Contact;
use App\Entity\Product;
use App\Entity\SettingGetfly;
use App\Entity\SettingOrder;
use App\Entity\User;
use App\Mail\Mail;
use App\Ultility\Error;
use App\Ultility\InforFacebook;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\URL;
use Maatwebsite\Excel\Facades\Excel;

class OrderController extends AdminController
{
    protected $role;

    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->role =  Auth::user()->role;

            if (!User::isManager($this->role) && !User::isStocker($this->role)) {
                return redirect('admin/home');
            }

            return $next($request);
        });

    }

    public function setting(Request $request) {
        try {
            if ($request->has('accesstoken')) {
                User::where('id', Auth::user()->id)->update([
                    'accesstoken' => $request->input('accesstoken')
                ]);
            }
            $orderShips = OrderShip::get();
            $orderBanks = OrderBank::get();
            $orderCodeSales = OrderCodeSale::get();
            $settingOrder = SettingOrder::first();
            $userId = Auth::user()->id;
            $settingEmail = MailConfig::where('user_id', $userId)->first();
            if (empty($settingEmail)) {
                $mailConfigModel =  new MailConfig();
                $mailConfigModel->insert([
                    'user_id' => $userId,
                    'created_at' => new \Datetime(),
                    'updated_at' => new \DateTime()
                ]);
                $settingEmail = MailConfig::where('user_id', $userId)->first();
            }

            $loginUrl = $this->getLoginFacebook();

            return view('admin.order.setting', compact('orderShips', 'orderBanks', 'orderCodeSales', 'settingOrder', 'settingEmail', 'loginUrl'));
        } catch(\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị cài đặt thanh toán: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->setting: Lỗi xảy ra trong quá trình hiển thị cài đặt thanh toán');

            return redirect('admin/home');
        }
    }

    private function getLoginFacebook() {
        $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

        $urlLogin = 'http://facebook.vn3c.net/flogin?service_code=1c9b7597b1e8b09e61b419235f1d207a&currentUrl='.$actual_link;

        return $urlLogin;
    }

    public function updateSetting(Request $request) {
        try {
            $settingOrder = new SettingOrder();

            $settingOrder->delete();
            $settingOrder->insert([
                'point_to_currency' => $request->input('point_to_currency'),
                'currency_give_point' => $request->input('currency_give_point'),
            ]);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi cập nhật cài đặt thanh toán: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->setting: Lỗi xảy ra trong quá trình cập nhật cài đặt thanh toán');
        } finally {
            return redirect(route('method_payment'));
        }
    }
    public function updateBank(Request $request) {
        try {
            $orderBank = new OrderBank();
            $orderBank->insert([
                'name_bank' => $request->input('name_bank'),
                'number_bank' => $request->input('number_bank'),
                'manager_account' => $request->input('manager_account'),
                'branch' => $request->input('branch'),
            ]);


        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi cập nhật ngân hàng cài đặt thanh toán: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->updateBank: Lỗi xảy ra trong quá trình cập nhật ngân hàng cài đặt thanh toán');
        } finally {
            return redirect(route('method_payment'));
        }
    }
    public function deleteBank(OrderBank $orderBanks){
        try {
            OrderBank::where('order_bank_id' , $orderBanks->order_bank_id)
              ->delete();
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi xóa ngân hàng cài đặt thanh toán: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->deleteBank: Lỗi xảy ra trong quá trình xóa ngân hàng cài đặt thanh toán');
        } finally {
            return redirect(route('method_payment'));
        }
    }
    public function updateCodeSale(Request $request) {
        try {
            $orderCodeSale = new OrderCodeSale();

            $discountStartEnd = $request->input('code_sale_start_end');
            $discountTime = explode('-', $discountStartEnd);
            $discountStart = new \DateTime($discountTime[0]);
            $discountEnd = new \DateTime($discountTime[1]);

            $orderCodeSale->insert([
                'code' => $request->input('code'),
                'method_sale' => $request->input('method_sale'),
                'sale' => $request->input('sale'),
                'start' =>  $discountStart,
                'end' => $discountEnd ,
                'many_use' => $request->input('many_use'),
            ]);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi cập nhật mã giảm giá: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->updateCodeSale: Lỗi xảy ra trong quá trình cập nhật mã giảm giá ');
        } finally {
            return redirect(route('method_payment'));
        }
    }
    public function deleteCodeSale(OrderCodeSale $orderCodeSales){
        try {
            OrderCodeSale::where('order_code_sale_id' , $orderCodeSales->order_code_sale_id)->delete();
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi xóa mã giảm giá: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->deleteCodeSale: Lỗi xảy ra trong quá trình xóa mã giảm giá ');
        } finally {
            return redirect(route('method_payment'));
        }
    }
    public function updateShip(Request $request) {
        try {
            $orderShip =  new OrderShip();
            $orderShip->insert([
                'method_ship' => $request->input('method_ship'),
                'cost' => $request->input('cost'),
            ]);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi cập nhật vận chuyển: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->updateShip: Lỗi xảy ra trong quá trình cập nhật vận chuyển');
        } finally {
            return redirect(route('method_payment'));
        }
    }

    public function updateSettingGetFly(Request $request) {
        try {
            $user = Auth::user();
            $settingGetfly = SettingGetfly::where('user_id', $user->id)->first();
            // Nếu không tồn tại thì thêm mới
            if (empty($settingGetfly)) {
                SettingGetfly::insert([
                    'user_id' => $user->id,
                    'api_key' => $request->input('api_key'),
                    'base_url' => $request->input('base_url'),
                    'created_at' => new \Datetime(),
                    'updated_at' => new \DateTime()
                ]);

                return redirect(route('method_payment'));
            }

            $settingGetfly->update([
                'api_key' => $request->input('api_key'),
                'base_url' => $request->input('base_url'),
                'created_at' => new \Datetime(),
                'updated_at' => new \DateTime()
            ]);

        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi cập nhật dữ liệu getfly: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->updateSettingGetFly: Lỗi xảy ra trong quá trình cập nhật cài đặt getfly');
        } finally {
            return redirect(route('method_payment'));
        }
    }

    public function updateSettingEmail(Request $request) {
        try {
            $user = Auth::user();
            $mailConfigModel = new MailConfig();
            $mailConfig = $mailConfigModel->where('user_id', $user->id)->first();
            // Nếu không tồn tại thì thêm mới
            if (empty($mailConfig)) {
                $mailConfigModel->insert([
                    'user_id' => $user->id,
                    'email_send' => $request->input('email_send'),
                    'name_send' => $request->input('name_send'),
                    'email' => $request->input('email'),
                    'password' => $request->input('password'),
                    'address_server' => $request->input('address_server'),
                    'port' => $request->input('port'),
                    'sign' => $request->input('sign'),
                    'supplier' => $request->input('supplier'),
                    'method' => $request->input('method'),
                    'api_key' => $request->input('api_key'),
                    'driver' => $request->input('driver'),
                    'host' => $request->input('host'),
                    'email_receive' => $request->input('email_receive'),
                    'encryption' => $request->input('encryption'),
                    'created_at' => new \Datetime(),
                    'updated_at' => new \DateTime()
                ]);

                return redirect(route('method_payment').'#email');
            }

            $mailConfig->update([
                'user_id' => $user->id,
                'email_send' => $request->input('email_send'),
                'name_send' => $request->input('name_send'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
                'address_server' => $request->input('address_server'),
                'port' => $request->input('port'),
                'sign' => $request->input('sign'),
                'supplier' => $request->input('supplier'),
                'method' => $request->input('method'),
                'api_key' => $request->input('api_key'),
                'driver' => $request->input('driver'),
                'host' => $request->input('host'),
                'email_receive' => $request->input('email_receive'),
                'encryption' => $request->input('encryption'),
                'created_at' => new \Datetime(),
                'updated_at' => new \DateTime()
            ]);

        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi cập nhật cấu hình email: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->updateSettingEmail: Lỗi xảy ra trong quá trình cập nhật cấu hình email');
        } finally {
            return redirect(route('method_payment'));
        }
    }

    public function deleteShip(OrderShip $orderShips)
    {
        try {
            OrderShip::where('order_ship_id', $orderShips->order_ship_id)->delete();
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi xóa ship hàng: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->deleteShip: Lỗi xảy ra trong quá trình xóa ship hàng ');
        } finally {
            return redirect(route('method_payment'));
        }
    }
    public function listOrder(Request $request) {

        if (!User::isManager($this->role)) {
                return redirect('admin/home');
            }

        try{
            $orders = Order::orderBy('created_at', 'desc')
                ->where('status', '>=', 0);

            if (!empty($request->input('order_id'))) {
                $orders = $orders->where('order_id', 'like', '%'.$request->input('order_id').'%');
            }
            if (!empty($request->input('phone'))) {
                $orders = $orders->where('shipping_phone', 'like', '%'.$request->input('phone').'%');
            }
            if (!empty($request->input('email'))) {
                $orders = $orders->where('shipping_email', 'like', '%'.$request->input('email').'%');
            }
            if (!empty($request->input('name'))) {
                $orders = $orders->where('shipping_name', 'like', '%'.$request->input('name').'%');
            }
            if (!empty($request->input('user_id'))) {
                $orders = $orders->where('user_id', '=', $request->input('user_id'));
            }
            if (!empty($request->input('status')) && $request->input('status') >= 0) {
                $status = $request->input('status') - 1;
                $orders = $orders->where('status', '=', $status);
            }
            if (!empty($request->input('order_source')) && $request->input('order_source') >= 0) {
                $orderSource = $request->input('order_source') - 1;
                $orders = $orders->where('order_source', '=', $orderSource);
            }
	
	       if (!empty($request->input('is_delivery')) && $request->input('is_delivery') >= 0) {
                $stockStatus = $request->input('is_delivery') - 1;
                $orders = $orders->where('is_delivery', '=', $stockStatus)->where('status', '>', 0);
            }	
		
            if (!empty($request->input('is_shared_profit'))) {
                $orders = $orders->where('is_shared_profit', '=', 1);
            }
            if (!empty($request->input('is_redeem_origin'))) {
                $orders = $orders->where('is_redeem_origin', '=', 1);
            }
            if (!empty($request->input('is_not_shared_profit'))) {
                $orders = $orders->where('is_shared_profit', '=', 0);
            }
            if (!empty($request->input('is_not_redeem_origin'))) {
                $orders = $orders->where('is_redeem_origin', '=', 0);
            }
            if (!empty($request->input('current_city'))) {
                $orders = $orders->where('current_city', '=', 1);
            }
            if (!empty($request->input('product_names'))) {
                $productName = $request->input('product_names');
                $orders = $orders->where('product_names', 'like', '%'.strtoupper($productName).'%');
            }
            if (!empty($request->input('user_id'))) {
                $orders = $orders->where('user_id', '=', $request->input('user_id'));
            }
            if ($request->input('is_search_time') == 1) {
                $startEnd = $request->input('search_start_end');
                $time = explode('-', $startEnd);
                $start = $time[0];
                $end = $time[1];

                $orders = $orders->where('created_at', '>=', new \DateTime($start))
                    ->where('created_at', '<=', new \DateTime($end));
            }
            $totalRevenue = 0;
            $totalPrice = 0;
            $totalShip = 0;
            $totalOrigin = 0;
            $totalOrders = 0;
            $closeOrders = 0;
            $deliveryOrders = 0;
            $confirmOrders = 0;
            $notConfirmOrders = 0;
            $returnOrders = 0;
            $cancelOrders = 0;
            $currentCity = 0;
            if (!empty($request->input('is_cal_revenue'))) {
                $orderIdCalFrom = 0;
                $orderIdCalTo = 0;
                $ordersCalQr =  Order::where('status', '>=', 0);
                if(!empty($request->input('order_id'))){
                    $orderIdCal = explode(",",$request->input('order_id'));
                    if(sizeof($orderIdCal) > 1){
                        $orderIdCalFrom = $orderIdCal[0];
                        $orderIdCalTo = $orderIdCal[1];
                    }else{
                        $orderIdCalFrom = $orderIdCal[0];
                    }

                    $ordersCalQr = $ordersCalQr->where('order_id', '>=', $orderIdCalFrom)->where('status', '>=', 0);
                    if($orderIdCalTo > 0){
                        $ordersCalQr =  $ordersCalQr->where('order_id', '>=', $orderIdCalFrom)->where('order_id', '<=', $orderIdCalTo)->where('status', '>=', 0);
                    }
                }

                if ($request->input('is_search_time') == 1) {
                $startEnd = $request->input('search_start_end');
                $time = explode('-', $startEnd);
                $start = $time[0];
                $end = $time[1];

                $ordersCalQr = $ordersCalQr->where('created_at', '>=', new \DateTime($start))->where('created_at', '<=', new \DateTime($end))->where('status', '>=', 0);
                }
                $ordersCal = $ordersCalQr->get();
                foreach($ordersCal as $id => $order) {
                $ordersCal[$id]->orderItems = OrderItem::join('products','products.product_id','=', 'order_items.product_id')
                    ->join('posts', 'products.post_id','=','posts.post_id')
                    ->select(
                        'posts.*',
                        'products.price',
                        'products.discount',
                        'products.origin_price',
                        'products.code',
                        'products.short_name',
                        'order_items.*'
                    )
                    ->where('order_id', $order->order_id)->get();
                    if($order->status > 0){
                        if($order->status < 5){
                            $totalPrice += $order->total_price;
                            foreach ($ordersCal[$id]->orderItems as $orderItem) {
                                $totalOrigin += $orderItem->origin_price * $orderItem->quantity;
                            }
                        }
                        $totalShip += $order->cost_ship;
                    }
                    $totalOrders += 1;
                    if($order->status == 0){
                       $cancelOrders +=1;     
                    }
                    if($order->status == 1){
                       $notConfirmOrders +=1;     
                    }
                    if($order->status == 2){
                       $confirmOrders +=1;     
                    }
                    if($order->status == 3){
                       $deliveryOrders +=1;     
                    }
                    if($order->status == 4){
                       $closeOrders +=1;     
                    }
                    if($order->status == 5){
                       $returnOrders +=1;     
                    }
                    if($order->current_city == 1){
                        $currentCity +=1;
                    }
                }

                $totalRevenue = $totalPrice - $totalOrigin - $totalShip;

                $orders = Order::orderBy('created_at', 'desc')
                ->where('order_id', '>=', $orderIdCalFrom)->where('status', '>=', 0);

                if($orderIdCalTo > 0){
                    $orders = Order::orderBy('created_at', 'desc')
                ->where('order_id', '>=', $orderIdCalFrom)->where('order_id', '<=', $orderIdCalTo)->where('status', '>=', 0);
                }

                if ($request->input('is_search_time') == 1) {
                $startEnd = $request->input('search_start_end');
                $time = explode('-', $startEnd);
                $start = $time[0];
                $end = $time[1];

                $orders = Order::orderBy('created_at', 'desc')->where('created_at', '>=', new \DateTime($start))->where('created_at', '<=', new \DateTime($end))->where('status', '>=', 0);
                }

                $orders = $orders->paginate(100);
                $orders->appends(['status' => $request->input('status')]);
                $orders->appends(['current_city' => $request->input('current_city')]);
                $orders->appends(['is_search_time' => $request->input('is_search_time')]);
                $orders->appends(['search_start_end' => $request->input('search_start_end')]);

                foreach($orders as $id => $order) {
                    $orders[$id]->orderItems = OrderItem::join('products','products.product_id','=', 'order_items.product_id')
                        ->join('posts', 'products.post_id','=','posts.post_id')
                        ->select(
                            'posts.*',
                            'products.price',
                            'products.discount',
                            'products.origin_price',
                            'products.code',
                            'products.short_name',
                            'order_items.*'
                        )
                        ->where('order_id', $order->order_id)->get();
                }

                return view('admin.order.list', compact('orders','totalPrice','totalOrigin','totalShip', 'totalRevenue', 'totalOrders','cancelOrders','notConfirmOrders','confirmOrders','deliveryOrders','closeOrders','returnOrders','currentCity'));
            }

            $orderShips = OrderShip::get();

            $orders = $orders->paginate(100);
            $orders->appends(['status' => $request->input('status')]);
            $orders->appends(['order_source' => $request->input('order_source')]);
            $orders->appends(['is_redeem_origin' => $request->input('is_redeem_origin')]);
            $orders->appends(['is_not_redeem_origin' => $request->input('is_not_redeem_origin')]);
            $orders->appends(['is_shared_profit' => $request->input('is_shared_profit')]);
            $orders->appends(['is_not_shared_profit' => $request->input('is_not_shared_profit')]);
            $orders->appends(['is_search_time' => $request->input('is_search_time')]);
            $orders->appends(['search_start_end' => $request->input('search_start_end')]);
            $orders->appends(['current_city' => $request->input('current_city')]);
            $orders->appends(['is_delivery' => $request->input('is_delivery')]);
            $orders->appends(['phone' => $request->input('phone')]);
            $orders->appends(['email' => $request->input('email')]);
            $orders->appends(['product_names' => $request->input('product_names')]);
            $orders->appends(['user_id' => $request->input('user_id')]);

            foreach($orders as $id => $order) {
                $orders[$id]->orderItems = OrderItem::join('products','products.product_id','=', 'order_items.product_id')
                    ->join('posts', 'products.post_id','=','posts.post_id')
                    ->select(
                        'posts.*',
                        'products.price',
                        'products.discount',
                        'products.origin_price',
                        'products.code',
                        'products.short_name',
                        'order_items.*'
                    )
                    ->where('order_id', $order->order_id)->get();
            }
            return view('admin.order.list', compact('orders', 'orderShips','totalPrice','totalOrigin','totalShip', 'totalRevenue','totalOrders','cancelOrders','notConfirmOrders','confirmOrders','deliveryOrders','closeOrders','returnOrders','currentCity'));
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị danh sách đơn hàng: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->listOrder: Lỗi xảy ra trong quá trình hhiển thị danh sách đơn hàng');

            return redirect('admin/home');
        }

    }


    public function updatePriceOrder(Request $request) {
        try {
            $orderId = $request->input('order_id');
            $order = Order::where('order_id', $orderId)->first();
            $customer_ship = !empty($request->input('customer_ship')) ? str_replace(".", "", $request->input('customer_ship')) : 0;
            $orderItems = OrderItem::where('order_id', $orderId)->get();
            $leng = count($orderItems);
            for($i = 0; $i < $leng; $i++){
                $originPrice = !empty($request->input('origin_price')[$i]) ? str_replace(".", "", $request->input('origin_price')[$i]) : 0;

                $cost = !empty($request->input('cost')[$i]) ? str_replace(".", "", $request->input('cost')[$i]) : 0;
                $quantity = $request->input('quantity')[$i];  
                $itemId = $request->input('item_id')[$i]; 
                $orderItem = OrderItem::where('item_id', $itemId)->first();

                $orderItem->update([
                    'origin_price' => $originPrice,
                    'cost' => $cost,
                    'quantity' => $quantity,
                ]);

            }

            $orderItems = OrderItem::where('order_id', $orderId)->get();
            $totalPrice = 0;
            foreach ($orderItems as $orderItem) {
                $totalPrice += $orderItem->cost*$orderItem->quantity;
            }

            $totalPrice = $totalPrice + $customer_ship;
            $order->update([
                'customer_ship' => $customer_ship,
                'total_price' => $totalPrice,
                'shipping_address' => $request->input('shipping_address'),
                'shipping_name' => $request->input('shipping_name'),
                'shipping_phone' => $request->input('shipping_phone'),
            ]);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi cập nhật thành tiền đơn hàng : dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->updatePriceOrder: Lỗi xảy ra trong quá trình cập nhật thành tiền đơn hàng');
        } finally {
            return redirect(route('orderAdmin.show', ['order_id' => $orderId]));
        }

    }

    public function updateStatusOrder(Request $request) {
        try {
            $orderId = $request->input('order_id');
            $status = $request->input('status');
            $noteStock = $request->input('note_stock');
            $orderSource = $request->input('order_source');
            $noteAdmin = $request->input('noteAdmin');
            $shippingCode = $request->input('shipping_code');
            $costShip = !empty($request->input('cost_ship')) ? str_replace(".", "", $request->input('cost_ship')) : 0;
            $order = Order::where('order_id', $orderId)->first();
            $currentStatus = $order->status;
            $current_date_time = date('Y-m-d H:i:s');
            $order->update([
                'status' => $status,
                'order_source' => $orderSource,
                'note_admin' => $noteAdmin,
                'cost_ship' => $costShip,
                'shipping_code' => $shippingCode,
                'note_stock' => $noteStock,
                'is_delivery' => $request->has('is_delivery') ? 1 : 0,
                'is_redeem_origin' => $request->has('is_redeem_origin') ? 1 : 0,
                'is_shared_profit' => $request->has('is_shared_profit') ? 1 : 0,
		        'current_city' => $request->has('current_city') ? 1 : 0,   
            ]);

            if($status == 0){
                if($order->is_delivery == 1){
                    $order->update([
                    'delivery_at' => null,
                    'is_delivery' => 0
                    ]);

                    $orderItems = OrderItem::where('order_id', $orderId)->get();
                    foreach($orderItems as $orderItem) {
                        $product = Product::where('product_id', $orderItem->product_id)->first();
                        $vitualAts = $product->available + $orderItem->quantity;    
                        $realAts = $product->ats + $orderItem->quantity;
                        $product->update([
                            'available' =>  $vitualAts,
                            'ats' => $realAts
                        ]);
                    }
                }
            }

            if($request->has('is_delivery')){
                $statusUpdated = $order->status;
                if($statusUpdated == 2){
                    $statusUpdated = 3;
                    $order->update([
                    'delivery_at' => $current_date_time,
                    'status' => $statusUpdated
                    ]);

                    $orderItems = OrderItem::where('order_id', $orderId)->get();
                    foreach($orderItems as $orderItem) {
                        $product = Product::where('product_id', $orderItem->product_id)->first();
                        $currentAvailable = $product->available;
                        $vitualAts = 88;
                        if($currentAvailable > ($orderItem->quantity + 5)){
                            $vitualAts = $currentAvailable - $orderItem->quantity;    
                        }
                        $realAts = $product->ats;
                        if($realAts > $orderItem->quantity){
                            $realAts = $realAts - $orderItem->quantity;
                        }
                        $product->update([
                            'available' =>  $vitualAts,
                            'ats' => $realAts
                        ]);
                    }
                }
                
            }else{
                $status = $order->status;
                if($status == 3){
                    $status = 2;
                    $order->update([
                    'delivery_at' => null,
                    'status' => $status
                    ]);

                    $orderItems = OrderItem::where('order_id', $orderId)->get();
                    foreach($orderItems as $orderItem) {
                        $product = Product::where('product_id', $orderItem->product_id)->first();
                        $vitualAts = $product->available + $orderItem->quantity;    
                        $realAts = $product->ats + $orderItem->quantity;
                        $product->update([
                            'available' =>  $vitualAts,
                            'ats' => $realAts
                        ]);
                    }
                }
                
            }


             
            $this->insertAppointment($request, $order);

        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi cập nhật trạng thái đơn hàng: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->updateStatusOrder: Lỗi xảy ra trong quá trình cập nhật trạng thái đơn hàng');
        } finally {
            return redirect(route('orderAdmin'));
        }

    }

    private function insertAppointment($request, $order) {
        try {
            $orderId = $order->order_id;
            $currentContact = Contact::where('order_id', $orderId)->first();
            if($currentContact != null){
                if($request->input('status') == 0){
                    $currentContact->delete();
                }else{
                    return;
                }
            }
            if($request->input('status') != 2){
                return;
            }
            $appDateStr = $request->input('appointment_date_str');
            $appDate = null;
            if($appDateStr){
                $appDate = new \DateTime($appDateStr);
            }else{
                return;
            }
            $contact = new Contact();
            $contact->insert([
                'name' => $order->shipping_name,
                'phone' => $order->shipping_phone,
                'email' => $order->shipping_email,
                'address' => $order->shipping_address,
                'message' => $order->product_names,
                'type' => 1,
                'status' => 0,
                'appointment_date'=>$appDate,
                'order_id' => $orderId,
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ]);
        } catch(\Exception $e) {
            Error::setErrorMessage('http->admin->OrderController->insertAppointment: Lỗi thêm mới liên hệ');
            Log::error(' http->admin->OrderController->insertAppointment: Lỗi thêm mới liên hệ');
        }
    }

	private function sendMailCustomer($status, $noteAdmin, $order) {
		try {
			$statusString = '';
			switch ($status) {
				case 1:
					$statusString = 'Đơn hàng đã được đặt thành công';
					break;
				case 2:
					$statusString = 'Đơn hàng đã được tiếp nhận';
					break;
				case 3:
					$statusString = 'Đơn hàng đang được vận chuyển';
					break;
				case 4:
					$statusString = 'Đơn hàng đã giao hàng thành công';
					break;
			}
		    $subject =  'Trạng thái đơn hàng của bạn vừa được cập nhật';
		    $content =  'Trạng thái đơn hàng của bạn đã được cập nhật thành '.$statusString;
			if (!empty($noteAdmin)) {
				$content .= '. Ghi chú của chúng tôi: '.$noteAdmin;
			}

		//   MailConfig::sendMail($order->shipping_email, $subject, $content);
		} catch (\Exception $e) {

	    }
	}
    public function deleteOrder(Order $order) {
        if (!User::isManager($this->role)) {
                return redirect('admin/home');
            }
        try {
            // delete order item
            OrderItem::where('order_id', $order->order_id)->delete();

            $order->delete();
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi xóa đơn hàng: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->deleteOrder: Lỗi xảy ra trong quá trình xóa đơn hàng');
        } finally {
            return redirect(route('orderAdmin'));
        }
    }

    public function showOrder(Order $order) {
        if (!User::isManager($this->role)) {
                return redirect('admin/home');
            }
        try {

            //update refund order
           $orderRefund = Order::where('shipping_phone', $order->shipping_phone)->where('status', 5)->count();
           if($orderRefund > 0){
              $orderRefund = 1;
           }else{
              $orderRefund = 0;
           } 
           $order->have_refund_order = $orderRefund; 
            // delete order item
            $orderItems = OrderItem::join('products','products.product_id','=', 'order_items.product_id')
                ->join('posts', 'products.post_id','=','posts.post_id')
                ->select(
                    'posts.*',
                    'products.price',
                    'products.discount',
                    'products.code',
                    'products.short_name',
                    'order_items.*'
                )
                ->where('order_id', $order->order_id)->get();

            return view('admin.order.detail', compact('order', 'orderItems'));
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi xóa đơn hàng: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->deleteOrder: Lỗi xảy ra trong quá trình xóa đơn hàng');
        }

    }

    public function showOrderForStocker(Order $order) {
        try {
            $orderShips = OrderShip::get();
            // delete order item
            $orderItems = OrderItem::join('products','products.product_id','=', 'order_items.product_id')
                ->join('posts', 'products.post_id','=','posts.post_id')
                ->select(
                    'posts.*',
                    'products.price',
                    'products.discount',
                    'products.code',
                    'products.short_name',
                    'order_items.*'
                )
                ->where('order_id', $order->order_id)->get();

            return view('admin.order.detail_stock', compact('order', 'orderItems', 'orderShips'));
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi xóa đơn hàng: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->deleteOrder: Lỗi xảy ra trong quá trình xóa đơn hàng');
        }

    }

    public function updateOrderStock(Request $request) {
        try {
            $orderId = $request->input('order_id');
            $noteStock = $request->input('note_stock');
            $shippingCode = $request->input('shipping_code');
            $current_date_time = date('Y-m-d H:i:s');
            $order = Order::where('order_id', $orderId)->first();
            $order->update([
                'note_stock' => $noteStock,
                'delivery_at' => $current_date_time,
		        'shipping_code'=>$shippingCode,
                'is_delivery' => $request->has('is_delivery') ? 1 : 0
            ]);

            if($request->has('is_delivery')){
                $status = $order->status;
                if($status == 2){
                    $status = 3;
                    $order->update([
                    'delivery_at' => $current_date_time,
                    'status' => $status
                    ]);

                    $orderItems = OrderItem::where('order_id', $orderId)->get();
                    foreach($orderItems as $orderItem) {
                        $product = Product::where('product_id', $orderItem->product_id)->first();
                        $currentAvailable = $product->available;
                        $vitualAts = 88;
                        if($currentAvailable > ($orderItem->quantity + 5)){
                            $vitualAts = $currentAvailable - $orderItem->quantity;    
                        }
                        $realAts = $product->ats;
                        if($realAts > $orderItem->quantity){
                            $realAts = $realAts - $orderItem->quantity;
                        }
                        $product->update([
                            'available' =>  $vitualAts,
                            'ats' => $realAts
                        ]);
                    }
                }
            }else{
                $status = $order->status;
                if($status == 3){
                    $status = 2;
                    $order->update([
                    'delivery_at' => null,
                    'status' => $status
                    ]);

                    $orderItems = OrderItem::where('order_id', $orderId)->get();
                    foreach($orderItems as $orderItem) {
                        $product = Product::where('product_id', $orderItem->product_id)->first();   
                        $realAts = $product->ats + $orderItem->quantity;
                        $product->update([
                            'ats' => $realAts
                        ]);
                    }
                }
            }

        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi cập nhật trạng thái kho');
            Log::error('http->admin->OrderController->updateStatusOrder: Lỗi xảy ra trong quá trình cập nhật trạng thái đơn hàng');
        } finally {
            return redirect(route('orderStocker'));
        }

    }

    // public function exportToExcel() {
    //     try {
    //         if (empty($request->input('order_id'))) {
    //             return;
    //         }
    //         $ordersCal = Order::where('order_id', '>=', $request->input('order_id'));
    //         $totalRevenue = 0;
    //         foreach ($ordersCal as $order) {
    //             $orderItems = OrderItem::join('products','products.product_id','=', 'order_items.product_id')
    //                 ->join('posts', 'products.post_id','=','posts.post_id')
    //                 ->select(
    //                     'posts.*',
    //                     'products.price',
    //                     'products.discount',
    //                     'products.code',
    //                     'order_items.*'
    //                 )
    //                 ->where('order_id', $order->order_id)->get();
    //             $totalPrice = $order->total_price;
    //             $totalOrgin = 0;
    //             foreach ($orderItems as $orderItem) {
    //                 $totalOrgin += $orderItem->origin_price * $orderItem->quantity;
    //             }
    //             $totalRevenue += ($totalPrice - $totalOrgin);    
    //         };

    //         $orderShips = OrderShip::get();
    //         $orders = Order::orderBy('created_at', 'desc')->where('order_id', '>=', $request->input('order_id'));
    //         $orders = $orders->paginate(50);
    //         foreach($orders as $id => $order) {
    //             $orders[$id]->orderItems = OrderItem::join('products','products.product_id','=', 'order_items.product_id')
    //                 ->join('posts', 'products.post_id','=','posts.post_id')
    //                 ->select(
    //                     'posts.*',
    //                     'products.price',
    //                     'products.discount',
    //                     'products.origin_price',
    //                     'products.code',
    //                     'products.short_name',
    //                     'order_items.*'
    //                 )
    //                 ->where('order_id', $order->order_id)->get();
    //         }

    //         return view('admin.order.list', compact('orders', 'totalRevenue'));
    //     } catch (\Exception $e) {
    //         Error::setErrorMessage('Lỗi xảy ra khi xuất đơn hàng: dữ liệu không hợp lệ.');
    //         Log::error('http->admin->OrderController->exportToExcel: Lỗi xảy ra trong quá trình xuất đơn hàng');

    //         return null;
    //     }

    // }


    public function listOrderForStocker(Request $request) {
        try{
            $orders = Order::orderBy('created_at', 'desc')
                ->whereIn('status', [0, 2, 3]);

            if (!empty($request->input('order_id'))) {
                $orders = $orders->where('order_id', 'like', '%'.$request->input('order_id').'%');
            }
            if (!empty($request->input('phone'))) {
                $orders = $orders->where('shipping_phone', 'like', '%'.$request->input('phone').'%');
            }
            if (!empty($request->input('email'))) {
                $orders = $orders->where('shipping_email', 'like', '%'.$request->input('email').'%');
            }
            if (!empty($request->input('name'))) {
                $orders = $orders->where('shipping_name', 'like', '%'.$request->input('name').'%');
            }
            if (!empty($request->input('current_city'))) {
                $orders = $orders->where('current_city', '=', 1);
            }
            if (!empty($request->input('user_id'))) {
                $orders = $orders->where('user_id', '=', $request->input('user_id'));
            }
			
            if (!empty($request->input('is_delivery')) && $request->input('is_delivery') >= 0) {
                $stockStatus = $request->input('is_delivery') - 1;
                $orders = $orders->where('is_delivery', '=', $stockStatus)->where('status', '>', 0);
            }
		
            $totalOrders = 0;
            $closeOrders = 0;
            $deliveryOrders = 0;
            $confirmOrders = 0;
            $notConfirmOrders = 0;
            $returnOrders = 0;
            $cancelOrders = 0;
        

            $orderShips = OrderShip::get();

            $orders = $orders->paginate(100);
            $orders->appends(['phone' => $request->input('phone')]);
            $orders->appends(['email' => $request->input('email')]);
            $orders->appends(['user_id' => $request->input('user_id')]);
            $orders->appends(['current_city' => $request->input('current_city')]);

            foreach($orders as $id => $order) {
                $orders[$id]->orderItems = OrderItem::join('products','products.product_id','=', 'order_items.product_id')
                    ->join('posts', 'products.post_id','=','posts.post_id')
                    ->select(
                        'posts.*',
                        'products.price',
                        'products.discount',
                        'products.origin_price',
                        'products.code',
                        'products.short_name',
                        'order_items.*'
                    )
                    ->where('order_id', $order->order_id)->get();
            }
            return view('admin.order.list_stock', compact('orders', 'orderShips','totalPrice','totalOrigin','totalShip', 'totalRevenue','totalOrders','cancelOrders','notConfirmOrders','confirmOrders','deliveryOrders','closeOrders','returnOrders'));
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị danh sách đơn hàng: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->listOrder: Lỗi xảy ra trong quá trình hhiển thị danh sách đơn hàng');

            return redirect('admin/home');
        }

    }


    public function exportToExcel(Request $request) {
        try {

            $orderIdFrom = 0;
            $orderIdTo = 0;
            if (!empty($request->input('from_order_id'))) {
                $orderIdFrom = $request->input('from_order_id');
            }
            if (!empty($request->input('to_order_id'))) {
                $orderIdTo = $request->input('to_order_id');
            }

            $orderItems = OrderItem::join('orders','orders.order_id','=', 'order_items.order_id')
                    ->join('products','products.product_id','=', 'order_items.product_id')
                    ->join('posts', 'products.post_id','=','posts.post_id')
                    ->select(
                        'orders.order_id',
                        'orders.status',
                        'orders.created_at',
                        'orders.shipping_name',
                        'orders.shipping_phone',
                        'orders.total_price',
                        'orders.customer_ship',
                        'orders.cost_ship',
                        'posts.title',
                        'products.code',
                        'order_items.quantity',
                        'order_items.origin_price',
                        'order_items.cost'
                    )
                    ->where('orders.status', '>', 0)->where('order_items.order_id', '>=', $orderIdFrom)->where('order_items.order_id', '<=', $orderIdTo)
                    ->orderBy('order_items.order_Id', 'desc')->get();
                    

            $data = array();
            $data[] = array(
                'Mã đơn',
                'Tên Khách',
                'SĐT',
                'Ngày đặt hàng',
                'Trạng thái',
                'Tổng tiền',
                'Khách ship',
                'Phí ship',
                'Mã SP',
                'Tên SP',
                'Số lượng',
                'Giá gốc',
                'Giá bán'
            );
            foreach ($orderItems as $item) {
                $statusStr = "";
                if($item->status == 5){
                    $statusStr = "Chuyển hoàn";
                }else if($item->status == 4){
                    $statusStr = "Đã giao";
                }
                else if($item->status == 3){
                    $statusStr = "Đang vận chuyển";
                }
                else if($item->status == 2){
                    $statusStr = "Đã nhận đơn";
                }
                else if($item->status == 1){
                    $statusStr = "Đã đặt hàng";
                }
                $data[] = array(
                    $item->order_id,
                    $item->shipping_name,
                    $item->shipping_phone,
                    $item->created_at,
                    $statusStr,
                    $item->total_price,
                    $item->customer_ship,
                    $item->cost_ship,
                    $item->code,
                    $item->title,
                    $item->quantity,
                    $item->origin_price,
                    $item->cost
                );
            };

            $fileName = "Danh-sach-don-hang-".$orderIdFrom . "-" . $orderIdTo;
            Excel::create($fileName, function($excel) use($data) {

                $excel->sheet('Đơn Hàng', function($sheet) use($data) {
                    $sheet->fromArray($data);

                });

            })->download('xls');
            return null;
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi xuất đơn hàng: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->exportToExcel: Lỗi xảy ra trong quá trình xuất đơn hàng');

            return null;
        }

    }


    public function productReport(Request $request) {
        try {

         if (!User::isManager($this->role)) {
                return redirect('admin/home');
            }   

        $fromDate1 = date('Y-m-d H:i:s',strtotime('-3 Monday'));
        $toDate1 = date('Y-m-d H:i:s',strtotime('-1 Monday'));
        $fromDate2 = date('Y-m-d H:i:s',strtotime('-5 Monday'));
        $toDate2 = date('Y-m-d H:i:s',strtotime('-3 Monday'));
        $fromDate3 = date('Y-m-d H:i:s',strtotime('-7 Monday'));
        $toDate3 = date('Y-m-d H:i:s',strtotime('-5 Monday'));
        $fromDate4 = date('Y-m-d H:i:s',strtotime('-9 Monday'));
        $toDate4 = date('Y-m-d H:i:s',strtotime('-7 Monday'));

        if(!empty($request->input('search_time'))){
            $searchTime = $request->input('search_time');
            $fromDate1 = date('Y-m-d H:i:s',strtotime('-3 Sunday', strtotime($searchTime)));
            $toDate1 = date('Y-m-d H:i:s',strtotime('-1 Sunday', strtotime($searchTime)));
            $fromDate2 = date('Y-m-d H:i:s',strtotime('-5 Sunday', strtotime($searchTime)));
            $toDate2 = date('Y-m-d H:i:s',strtotime('-3 Sunday', strtotime($searchTime)));
            $fromDate3 = date('Y-m-d H:i:s',strtotime('-7 Sunday', strtotime($searchTime)));
            $toDate3 = date('Y-m-d H:i:s',strtotime('-5 Sunday', strtotime($searchTime)));
            $fromDate4 = date('Y-m-d H:i:s',strtotime('-9 Sunday', strtotime($searchTime)));
            $toDate4 = date('Y-m-d H:i:s',strtotime('-7 Sunday', strtotime($searchTime)));
        }

        $productItemsBlock1 = DB::select('SELECT pd.product_id, pd.short_name, sum(itod.quantity) AS block1 FROM products pd 
LEFT JOIN (SELECT it.product_id, it.quantity FROM order_items it
JOIN orders od ON it.order_id = od.order_id  AND od.status <> 0 AND od.status <> 5 AND od.deleted_at is null AND od.created_at > :created_from AND od.created_at < :created_to) itod
ON pd.product_id = itod.product_id
WHERE pd.product_id IN (SELECT DISTINCT its.product_id FROM order_items its WHERE its.deleted_at is NULL)
GROUP BY pd.product_id, pd.short_name
ORDER BY block1 DESC',['created_from'=>$fromDate1,'created_to'=>$toDate1]); 

$productItemsBlock2 = DB::select('SELECT pd.product_id, sum(itod.quantity) AS block2 FROM products pd 
LEFT JOIN (SELECT it.product_id, it.quantity FROM order_items it
JOIN orders od ON it.order_id = od.order_id  AND od.status <> 0 AND od.status <> 5 AND od.deleted_at is null AND od.created_at > :created_from AND od.created_at < :created_to) itod
ON pd.product_id = itod.product_id
WHERE pd.product_id IN (SELECT DISTINCT its.product_id FROM order_items its WHERE its.deleted_at is NULL)
GROUP BY pd.product_id',['created_from'=>$fromDate2,'created_to'=>$toDate2]); 

$productItemsBlock3 = DB::select('SELECT pd.product_id, sum(itod.quantity) AS block3 FROM products pd 
LEFT JOIN (SELECT it.product_id, it.quantity FROM order_items it
JOIN orders od ON it.order_id = od.order_id  AND od.status <> 0 AND od.status <> 5 AND od.deleted_at is null AND od.created_at > :created_from AND od.created_at < :created_to) itod
ON pd.product_id = itod.product_id
WHERE pd.product_id IN (SELECT DISTINCT its.product_id FROM order_items its WHERE its.deleted_at is NULL)
GROUP BY pd.product_id',['created_from'=>$fromDate3,'created_to'=>$toDate3]); 

$productItemsBlock4 = DB::select('SELECT pd.product_id, sum(itod.quantity) AS block4 FROM products pd 
LEFT JOIN (SELECT it.product_id, it.quantity FROM order_items it
JOIN orders od ON it.order_id = od.order_id  AND od.status <> 0 AND od.status <> 5 AND od.deleted_at is null AND od.created_at > :created_from AND od.created_at < :created_to) itod
ON pd.product_id = itod.product_id
WHERE pd.product_id IN (SELECT DISTINCT its.product_id FROM order_items its WHERE its.deleted_at is NULL)
GROUP BY pd.product_id',['created_from'=>$fromDate4,'created_to'=>$toDate4]); 

        
        foreach ($productItemsBlock1 as $product) {

             foreach ($productItemsBlock2 as $product2) {
                $product->highlight = 0;
                if($product->product_id == $product2->product_id){
                    $product->block2 = $product2->block2;
                    if($product->block2 > $product->block1){
                        $product->highlight = 1;
                    }
                    break;
                }

             }  
             foreach ($productItemsBlock3 as $product3) {

                if($product->product_id == $product3->product_id){
                    $product->block3 = $product3->block3;
                    break;
                }

            }
            foreach ($productItemsBlock4 as $product4) {

                if($product->product_id == $product4->product_id){
                    $product->block4 = $product4->block4;
                    break;
                }

            } 

        }

        $fromDate1 = str_replace("00:00:00", "", $fromDate1);
        $fromDate2 = str_replace("00:00:00", "", $fromDate2);
        $fromDate3 = str_replace("00:00:00", "", $fromDate3);
        $fromDate4 = str_replace("00:00:00", "", $fromDate4);
        $toDate1 = str_replace("00:00:00", "", $toDate1);
        $toDate2 = str_replace("00:00:00", "", $toDate2);
        $toDate3 = str_replace("00:00:00", "", $toDate3);
        $toDate4 = str_replace("00:00:00", "", $toDate4);
                
           return view('admin.order.product_report',compact('productItemsBlock1','fromDate1','fromDate2','fromDate3','fromDate4','toDate1','toDate2','toDate3','toDate4'));


        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi xuất đơn hàng: dữ liệu không hợp lệ.');
            Log::error('http->admin->OrderController->productReport: Lỗi xảy ra trong quá trình xuất report');

            return null;
        }

    }

}
