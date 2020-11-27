<?php

namespace App\Http\Controllers\Admin;

use App\Entity\CartItem;
use App\Ultility\Error;
use Illuminate\Http\Request;
use App\Entity\User;
use App\Ultility\Ultility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Validator;

class CartItemController extends AdminController
{
    protected $role;

    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->role =  Auth::user()->role;

            if (!User::isManager($this->role)) {
                return redirect('admin/home');
            }

            return $next($request);
        });

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartItem = new CartItem();
        try {
            $cartItems = $cartItem->orderBy('cart_item_id', 'desc')
                ->paginate(100);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị liên hệ: dữ liệu lỗi.');

            Log::error('http->admin->CartItemController->index: Lỗi lấy dữ liệu cart items');

            $cartItems = null;
        } finally {
            return view('admin.cart_item.list', compact('cartItems'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\CartItem  $cartItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(CartItem  $cartItem)
    {
        $cartItem->delete();

        return redirect(route('cart-item.index'));
    }


    public function cartItemReport(Request $request) {
        try {

         if (!User::isManager($this->role)) {
                return redirect('admin/home');
            }

        $fromDate = date('Y-m-d',strtotime('-7 days'));

        if(!empty($request->input('search_time'))){
            $searchTime = $request->input('search_time');
            $fromDate = date('Y-m-d',strtotime($searchTime));
        }

        $cartItems = DB::select('SELECT it.product_id, it.product_name, count(1) as qty FROM cart_items it WHERE it.created_at >= :created_from AND it.deleted_at IS NULL GROUP BY it.product_id, it.product_name ORDER BY qty DESC',['created_from'=>$fromDate]); 

        $orderItems = DB::select('SELECT it.product_id, count(1) as qty FROM order_items it WHERE it.created_at >= :created_from AND it.deleted_at IS NULL GROUP BY it.product_id ORDER BY qty DESC',['created_from'=>$fromDate]); 

        $totalCartItem = 0;
        $totalOrderItem = 0;  
        
        foreach ($cartItems as $cartItem) { 
             $cartItem->done = 0;
             $totalCartItem += $cartItem->qty; 
             foreach ($orderItems as $orderItem) {
                if($cartItem->product_id == $orderItem->product_id){
                    $cartItem->done = $orderItem->qty; 
                    $totalOrderItem += $orderItem->qty;
                    break;
                }

             }  
        }

              
        return view('admin.cart_item.report',compact('cartItems','fromDate','totalCartItem','totalOrderItem'));


        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi xuất đơn hàng: dữ liệu không hợp lệ.');
            Log::error('http->admin->CartItemController->cartItemReport: Lỗi xảy ra trong quá trình xuất report');

            return null;
        }

    }
}
