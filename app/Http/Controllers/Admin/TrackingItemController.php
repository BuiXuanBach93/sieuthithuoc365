<?php

namespace App\Http\Controllers\Admin;

use App\Entity\TrackingItem;
use App\Ultility\Error;
use Illuminate\Http\Request;
use App\Entity\User;
use App\Ultility\Ultility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Validator;

class TrackingItemController extends AdminController
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
        $trackingItem = new TrackingItem();
        try {
            $trackingItems = $trackingItem->orderBy('tracking_id', 'desc')
                ->paginate(100);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị liên hệ: dữ liệu lỗi.');

            Log::error('http->admin->TrackingItemController->index: Lỗi lấy dữ liệu cart items');

            $trackingItems = null;
        } finally {
            return view('admin.tracking_item.suggestion_tracking_list', compact('trackingItems'));
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\TrackingItem  $trackingItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(TrackingItem  $trackingItem)
    {
        $trackingItem->delete();

        return redirect(route('tracking-item.index'));
    }
}
