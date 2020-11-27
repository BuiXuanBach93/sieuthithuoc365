<?php
/**
 * Created by PhpStorm.
 * User: Nam Handsome
 * Date: 10/16/2017
 * Time: 9:24 AM
 */

namespace App\Http\Controllers\Admin;

use App\Entity\Notification;
use App\Entity\Order;
use App\Entity\Task;
use App\Entity\Contact;
use App\Entity\CartItem;
use App\Entity\Post;
use App\Entity\TypeSubPost;
use App\Entity\User;
use App\Http\Controllers\Controller;
use App\Ultility\Ultility;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class AdminController extends Controller
{
    protected $isSale;

    public function __construct($countNotifi = 12){
        try {

            $countNotification = new Notification();
            $countReport = $countNotification->countReport();
            $typeSubPostsAdmin = TypeSubPost::orderBy('type_sub_post_id')
                ->get();
            $notifications = Notification::orderBy('notify_id', 'desc')
                ->offset(0)->limit($countNotifi)->get();

        } catch (\Exception $e) {
            $countReport = 0;
            $notifications = array();
            $typeSubPostsAdmin = array();

            Log::error('Lấy dạng bài viết và thông báo: '.$e->getMessage());

        } finally {

            view()->share([
                'countRp'=>$countReport,
                'notifications'=>$notifications,
                'typeSubPostsAdmin' => $typeSubPostsAdmin,
            ]);
        }

        
    }


    protected function createSlug($request) {
        try {
            // if slug null slug create as title
            $slug = $request->input('slug');
            if (empty($slug)) {
                $slug = Ultility::createSlug($request->input('title'));
            }
        } catch (\Exception $e) {
            $slug = rand(10,10000000);

        } finally {
            return $slug;
        }
    }

    public function home() {
        if (User::isMember(Auth::user()->role)) {
            Auth::logout();
        }

		session_start();
        $user = Auth::user();
        if (User::isManager($user->role) || User::isEditor($user->role)) {
            $_SESSION['loginSuccessAdmin'] = $user->email;
            $_SESSION['emailFolder'] = 'library';
        }

        $today = date('Y-m-d',strtotime("today"));
        $countPost = Post::where('post_type', 'post')->count();
        $countProduct = Post::where('post_type', 'product')->count();
        if(User::isEditor($user->role)){
            $countPost = Post::where('post_type', 'post')->where('created_by',$user->id)->count();
            $countProduct = Post::where('post_type', 'product')->where('created_by',$user->id)->count();
        }
        $countUser = User::count();
        $countOrder = Order::count();
        $countTaskNotDone = Task::where('assignee',$user->id)->whereIn('status',[0,1])->count();
        $countTask = Task::where('assignee',$user->id)->count();

        $countOrderNotDone = Order::where('status','=',1)->count();
        $countOrderNotDelivery = Order::where('status','=',2)->where('is_delivery','=',0)->count();

        $countRemarketing = Contact::where('type',1)->count();
        $countRemarketingNotDone = Contact::where('status',0)->where('type',1)->where('appointment_date','<=',date('Y-m-d'))->count();
        $countAdvisorRemarketing = Contact::where('type',1)->where('pass_to',$user->id)->count();
        $countAdvisorRemarketingNotDone = Contact::where('type',1)->where('pass_to',$user->id)->where('status',0)->where('appointment_date','<=',date('Y-m-d'))->count();

        $countContact = Contact::where('type',0)->count();
        $countContactNotDone = Contact::whereNull('status')->where('type',0)->count() + Contact::where('status',0)->where('type',0)->count();
        $countAdvisorContact = Contact::where('type',0)->where('pass_to',$user->id)->count();
        $countAdvisorContactNotDone = Contact::where('pass_to',$user->id)->whereNull('status')->where('type',0)->count() + Contact::where('pass_to',$user->id)->where('status',0)->where('type',0)->count();

        $countCartItem = CartItem::where('created_at','>=',$today)->count();
	    $countOrderToday = Order::where('created_at','>=',$today)->count();    


        $orders = Order::
            select(
                DB::raw('SUM(total_price) as total_sum'),
                DB::raw('YEAR (created_at) as year'),
                DB::raw('QUARTER(created_at) as quarter'))
            ->where('status', '<>', 0)
            ->where('status', '<>', 5)
            ->groupBy (
                DB::raw('YEAR (created_at)'),
                DB::raw('QUARTER(created_at)')
                )
            ->get();

$fromDate = date('Y-m-d',strtotime('-30 days'));

        $revenueDaily = DB::select('SELECT sum(total_price) as total_price,  DATE(created_at) as day_line 
            FROM orders where status <> 0 and status <> 5 and deleted_at is null and created_at > :created_from 
group by day_line 
order by day_line asc',['created_from'=>$fromDate]);  

$originDaily = DB::select('SELECT SUM(quantity*origin_price) as origin_price, DATE(od.created_at) as origin_day_line FROM order_items it 
LEFT JOIN orders od ON it.order_id = od.order_id 
WHERE od.status <> 0 AND od.status <> 5 AND od.deleted_at is null AND it.deleted_at is null  AND od.created_at > :created_from
GROUP BY origin_day_line',['created_from'=>$fromDate]);  

$shipDaily = DB::select('SELECT  SUM(od.cost_ship) as cost_ship, DATE(od.created_at) as ship_day_line
FROM orders od WHERE od.deleted_at is null and od.status <> 0 and od.created_at > :created_from
GROUP BY ship_day_line',['created_from'=>$fromDate]);    


foreach ($revenueDaily as $item) {
            $item->real_price = $item->total_price;
            $item->origin_price = 0;
            $item->cost_ship = 0;
             foreach ($originDaily as $origin) {
                if($origin->origin_day_line == $item->day_line){
                    $item->real_price = $item->real_price - $origin->origin_price;
                    $item->origin_price = $origin->origin_price;
                    break;
                }

             }  
             foreach ($shipDaily as $ship) {
                if($ship->ship_day_line == $item->day_line){
                    $item->real_price = $item->real_price - $ship->cost_ship;
                    $item->cost_ship = $ship->cost_ship;
                    break;
                }

            }
        }

// monthly

$fromMonth = date("Y-m-01", strtotime("-8 months"));

$revenueMonthly = DB::select('SELECT sum(total_price) as total_price,  MONTH(created_at) as day_line, YEAR(created_at) as day_line_year 
            FROM orders where status <> 0 and status <> 5 and deleted_at is null and created_at >= :created_from 
group by day_line, day_line_year 
order by day_line_year, day_line asc',['created_from'=>$fromMonth]);  

$originMonthly = DB::select('SELECT SUM(quantity*origin_price) as origin_price, MONTH(od.created_at) as origin_day_line FROM order_items it 
LEFT JOIN orders od ON it.order_id = od.order_id 
WHERE od.status <> 0 AND od.status <> 5 AND od.deleted_at is null AND it.deleted_at is null  AND od.created_at >= :created_from
GROUP BY origin_day_line',['created_from'=>$fromMonth]);  

$shipMonthly = DB::select('SELECT  SUM(od.cost_ship) as cost_ship, MONTH(od.created_at) as ship_day_line
FROM orders od WHERE od.deleted_at is null and od.status <> 0 and od.created_at >= :created_from
GROUP BY ship_day_line',['created_from'=>$fromMonth]);    


foreach ($revenueMonthly as $item) {
            $item->real_price = $item->total_price;
            $item->origin_price = 0;
            $item->cost_ship = 0;
             foreach ($originMonthly as $origin) {
                if($origin->origin_day_line == $item->day_line){
                    $item->real_price = $item->real_price - $origin->origin_price;
                    $item->origin_price = $origin->origin_price;
                    break;
                }

             }  
             foreach ($shipMonthly as $ship) {
                if($ship->ship_day_line == $item->day_line){
                    $item->real_price = $item->real_price - $ship->cost_ship;
                    $item->cost_ship = $ship->cost_ship;
                    break;
                }

            }
        }        



        return View('admin.home.index', compact(
            'countPost',
            'countProduct',
            'countUser',
            'orders',
            'revenueDaily',
            'revenueMonthly',
            'countTask',
            'countTaskNotDone',
            'countOrder',
            'countOrderNotDone',
            'countOrderNotDelivery',
            'countContact',
            'countCartItem',
	        'countOrderToday',
            'countContactNotDone',
            'countAdvisorContact',
            'countAdvisorContactNotDone',
            'countRemarketing',
            'countRemarketingNotDone',
            'countAdvisorRemarketing',
            'countAdvisorRemarketingNotDone'
        ));
    }

    public function dateline() {
        return View('admin.home.dateline');
    }
}
