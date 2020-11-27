<?php

namespace App\Http\Controllers\Site;

use App\Entity\TrackingItem;
use App\Ultility\Ultility;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Yangqi\Htmldom\Htmldom;

class HomeController extends SiteController
{
    public function __construct(){
        parent::__construct();
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // try{
        //     if($request->utm_source){
        //         $customerIp = Ultility::get_client_ip(); 
        //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
        //         if($county == 'VN'){
        //             if($request->utm_source == 'cartpage'){
        //                 TrackingItem::insert([
        //                  'source_product_name' => "GIỎ HÀNG",
        //                  'target_product_name' => "HOME PAGE",
        //                  'ip_customer' => $customerIp,
        //                  'type' => 6,
        //                  'created_at' =>   new \DateTime(),
        //                  'updated_at' =>   new \DateTime()
        //                 ]);
        //             }elseif($request->utm_source == 'topmenu'){
        //                 TrackingItem::insert([
        //                  'source_product_name' => "DESKTOP MENU",
        //                  'target_product_name' => "HOME PAGE",
        //                  'ip_customer' => $customerIp,
        //                  'type' => 6,
        //                  'created_at' =>   new \DateTime(),
        //                  'updated_at' =>   new \DateTime()
        //                 ]);
        //             }
        //             elseif($request->utm_source == 'mobilemenu'){
        //                 TrackingItem::insert([
        //                  'source_product_name' => "MOBILE LEFT MENU",
        //                  'target_product_name' => "HOME PAGE",
        //                  'ip_customer' => $customerIp,
        //                  'type' => 6,
        //                  'created_at' =>   new \DateTime(),
        //                  'updated_at' =>   new \DateTime()
        //                 ]);
        //             }
        //             elseif ($request->utm_source == 'orderpage') {
        //                 TrackingItem::insert([
        //                  'source_product_name' => "ĐƠN HÀNG : " . $request->sc_order_id,
        //                  'target_product_name' => "HOME PAGE",
        //                  'ip_customer' => $customerIp,
        //                  'type' => 6,
        //                  'created_at' =>   new \DateTime(),
        //                  'updated_at' =>   new \DateTime()
        //                 ]);
        //             }
        //         }
        //     }

        //     if($request->zarsrc){
        //         $customerIp = Ultility::get_client_ip(); 
        //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
        //         if($county == 'VN'){
        //             TrackingItem::insert([
        //                  'source_product_name' => "Zalo",
        //                  'target_product_name' => "HOME PAGE",
        //                  'ip_customer' => $customerIp,
        //                  'type' => 6,
        //                  'created_at' =>   new \DateTime(),
        //                  'updated_at' =>   new \DateTime()
        //                 ]);
        //         }
        //     }
        //     if($request->fbclid){
        //         $customerIp = Ultility::get_client_ip(); 
        //         $county = Ultility::getIpInfo($customerIp,'country_code'); 
        //         if($county == 'VN'){
        //             TrackingItem::insert([
        //                  'source_product_name' => "Facebook",
        //                  'target_product_name' => "HOME PAGE",
        //                  'ip_customer' => $customerIp,
        //                  'type' => 6,
        //                  'created_at' =>   new \DateTime(),
        //                  'updated_at' =>   new \DateTime()
        //                 ]);
        //         }
        //     }
            
                    
        // }catch (\Exception $e) {
        //   // do nothing
        // }
        return view('site.default.index');
    }
}
