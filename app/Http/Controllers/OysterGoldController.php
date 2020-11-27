<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use App\Entity\Contact;
use Illuminate\Http\Request;
use App\Entity\Notification;
use App\Entity\Input;
use App\Entity\MailConfig;
use App\Entity\Post;
use App\Mail\Mail;
use Validator;


class OysterGoldController extends Controller
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
               'content' => 'Oyster - Bạn vừa có liên hệ mới',
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

}
