<?php
/**
 * Created by PhpStorm.
 * User: nam tran
 * Date: 3/22/2018
 * Time: 9:44 AM
 */

namespace App\Http\Controllers\Admin;

use App\Entity\MailConfig;
use App\Entity\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\Mail;
use League\Flysystem\Config;

class SettingController extends AdminController
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


    public function testEmail(Request $request) {
//        try {
            $emailTest = $request->input('email_test');

            $result = $this->sendMail($emailTest);

            if ($result == true) {
                return redirect(route('method_payment').'?error=0');
            }

            return redirect(route('method_payment').'?error=1');
//        } catch (\Exception $e) {
//            return redirect(route('method_payment').'?error=1');
//        }

    }

    private function sendMail($emailTest) {
        if (!empty($this->domainUser)) {
            $subject = 'Website '.$this->domainUser->name.' kiểm tra email';
        } else {
            $subject = 'Website vn3c kiểm tra email';
        }

        $content = 'Kiểm tra cài dặt thông tin email thành công. Bạn có thể sử dụng để gửi đơn hàng, hay chăm sóc khách hàng.';

        return MailConfig::sendMail($emailTest, $subject, $content, Auth::user()->id);

    }
}