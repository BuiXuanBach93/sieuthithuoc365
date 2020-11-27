<?php
/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 10/28/2017
 * Time: 10:07 PM
 */

namespace App\Http\Controllers\Site;

use App\Entity\Contact;
use App\Entity\TrackingItem;
use App\Entity\Notification;
use App\Entity\Input;
use App\Entity\MailConfig;
use App\Entity\Post;
use App\Mail\Mail;
use App\Ultility\Ultility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Validator;

class ContactController extends SiteController
{
    public function __construct(){
        parent::__construct();
    }

    public function index() {

         return view('site.default.contact');
    }

    public function submit(Request $request) {
        $validation = Validator::make($request->all(), [
            'name' => 'required',
            'phone' => 'required'
        ]);

        // if validation fail return error
        if ($validation->fails()) {
            return response([
				'status' => 500,
				'message' => 'Lỗi điền form văn bản.',
			])->header('Content-Type', 'text/plain');
		 
			// return redirect(route('contact_home'))
                // ->withErrors($validation)
                // ->withInput();
        }
		 
        //success
        $contact = new Contact();
        $name = $request->input('name');
        $name = str_replace("<","",$name);
        $name = str_replace(">","",$name);
        $name = str_replace(";","",$name);

        $phone = $request->input('phone');
        $phone = str_replace("<","",$phone);
        $phone = str_replace(">","",$phone);
        $phone = str_replace(";","",$phone);

        $email = $request->input('email');
        if(!$email){
            $email = "no-email@gmail.com";
        }
        $email = str_replace("<","",$email);
        $email = str_replace(">","",$email);
        $email = str_replace(";","",$email);

        $address = $request->input('address');
        $address = str_replace("<","",$address);
        $address = str_replace(">","",$address);
        $address = str_replace(";","",$address);

        $message = $request->input('message');
        $message = str_replace("<","",$message);
        $message = str_replace(">","",$message);
        $message = str_replace(";","",$message); 

        $from = $request->input('from');
        if(!$from){
            $from = "unknow";
        }       
        $productId = $request->input('product_id');
        if(!$productId){
            $productId = 0;
        } 
        $contact->insert([
            'name' => $name,
            'phone' => $phone,
            'email' => $email,
            'address' => $address,
            'customer_action' => $from,
            'message' => $message,
            'product_id'=>$productId,
            'ip_customer' => Ultility::get_client_ip(),
			'images' => $request->has('images') ? implode('-', $request->input('images')) : '',
            'created_at' => new \DateTime(),
            'updated_at' => new \DateTime()
        ]);

        $orderDb = new Notification();
           $orderDb->insert([
               'title' => 'Liên hệ',
               'content' => 'Bạn vừa có liên hệ mới',
               'status' => '0',
               'url' => asset('/admin/contact'),
               'created_at' => new \DateTime(),
               'updated_at' => new \DateTime()
           ]);

        $success = 1;
      //  $this->sendMainContact($request);
		
		if ($request->has('is_upload_image') == 1) {
			return redirect('/trang/cam-on-mua-thuoc-theo-toa');
		}

        $customerIp = Ultility::get_client_ip(); 
        $county = Ultility::getIpInfo($customerIp,'country_code'); 
        if($county == 'VN'){
            TrackingItem::insert([
             'source_product_name' => "SẢN PHẨM : ".$message,
             'target_product_name' => "YÊU CẦU TƯ VẤN",
             'ip_customer' => $customerIp,
             'type' => 8,
             'created_at' =>   new \DateTime(),
             'updated_at' =>   new \DateTime()
            ]);
        }
		
		return response([
             'status' => 200,
             'message' => 'Cảm ơn bạn đã liên hệ cho chúng tôi, chúng tôi sẽ phản hồi sớm nhất.',
         ])->header('Content-Type', 'text/plain');

    }


    private function sendMainContact($request)  {

        $subject =  'Có liên hệ mới từ website';
        $content = '<p>Khách hàng: '. $request->input('name'). ' </p>

        <p>SĐT : ' . $request->input('phone') . '</p> 

        <p>Email : '. $request->input('email') . '</p>

        <p>Nội dung liên hệ : ' . $request->input('message') . '</p>';

        MailConfig::sendMail('', $subject, $content);
    }
}
