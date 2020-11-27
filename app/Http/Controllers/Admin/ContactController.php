<?php

namespace App\Http\Controllers\Admin;

use App\Entity\Contact;
use App\Entity\Notification;
use App\Ultility\Error;
use Illuminate\Http\Request;
use App\Entity\User;
use App\Ultility\Ultility;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Validator;

class ContactController extends AdminController
{
    protected $role;

    public function __construct()
    {
        parent::__construct();
        $this->middleware(function ($request, $next) {
            $this->role =  Auth::user()->role;

            if (!User::isManager($this->role) && !User::isAdvisor($this->role)) {
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
        if (!User::isManager($this->role)) {
                return redirect('admin/home');
            }
            
        $contact = new Contact();
        try {
            $contacts = $contact->where('type',0)->orderBy('contact_id', 'desc')
                ->paginate(15);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị liên hệ: dữ liệu lỗi.');

            Log::error('http->admin->ContactController->index: Lỗi lấy dữ liệu contacts');

            $contacts = null;
        } finally {
            return view('admin.contact.list', compact('contacts'));
        }
    }


    public function listAdvisorContact()
    {
        $contact = new Contact();
        $userId = Auth::user()->id;
        try {
            $contacts = $contact->where('pass_to', $userId)->where('type', 0)->orderBy('contact_id', 'desc')
                ->paginate(15);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị liên hệ: dữ liệu lỗi.');

            Log::error('http->admin->ContactController->listContactAdvisor: Lỗi lấy dữ liệu contacts');

            $contacts = null;
        } finally {
            return view('admin.contact.list_advisor', compact('contacts'));
        }
    }


    public function listRemarketingContact()
    {
        $contact = new Contact();
        $userId = Auth::user()->id;
        try {
            // $contacts = $contact->where('type', 1)->orderBy('contact_id', 'desc')
            //     ->paginate(15);


            $contacts = DB::select('SELECT * FROM contact where type = 1 and deleted_at is null and status = 0 and appointment_date is not null order by abs(datediff(appointment_date, now())) limit 200'); 

    
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị liên hệ: dữ liệu lỗi.');

            Log::error('http->admin->ContactController->listRemarketingContact: Lỗi lấy dữ liệu contacts');

            $contacts = null;
        } finally {
            return view('admin.contact.list_remarketing', compact('contacts'));
        }
    }

    public function listRemarketingContactDone()
    {
        $contact = new Contact();
        $userId = Auth::user()->id;
        try {
            $contacts = $contact->where('status', 1)->where('type', 1)->orderBy('contact_id', 'desc')
                ->paginate(15);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị liên hệ: dữ liệu lỗi.');

            Log::error('http->admin->ContactController->listRemarketingContactDone: Lỗi lấy dữ liệu contacts');

            $contacts = null;
        } finally {
            return view('admin.contact.list_remarketing_done', compact('contacts'));
        }
    }

    public function listAdvisorRemarketingContact()
    {
        $contact = new Contact();
        $userId = Auth::user()->id;
        try {
            $contacts = DB::select('SELECT * FROM contact where type = 1 and status = 0 and deleted_at is null and appointment_date is not null and pass_to = :assignee order by abs(datediff(appointment_date, now())) limit 200', ['assignee'=>$userId]); 
                
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị liên hệ: dữ liệu lỗi.');

            Log::error('http->admin->ContactController->listAdvisorRemarketingContact: Lỗi lấy dữ liệu contacts');

            $contacts = null;
        } finally {
            return view('admin.contact.list_advisor_remarketing', compact('contacts'));
        }
    }

    public function listAdvisorRemarketingContactDone()
    {
        $contact = new Contact();
        $userId = Auth::user()->id;
        try {
            $contacts = $contact->where('status', 1)->where('type', 1)->where('pass_to', $userId)->orderBy('contact_id', 'desc')
                ->paginate(15);
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi hiển thị liên hệ: dữ liệu lỗi.');

            Log::error('http->admin->ContactController->listAdvisorRemarketingContactDone: Lỗi lấy dữ liệu contacts');

            $contacts = null;
        } finally {
            return view('admin.contact.list_advisor_remarketing_done', compact('contacts'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('admin.contact.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if slug null slug create as title
        $this->insertContact($request);

        return redirect(route('contact.index'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createAppointment(Request $request)
    {
        // if slug null slug create as title
        $this->insertAppointment($request);

        return redirect(route('contact-remarketing'));
    }

    private function insertContact($request) {
        try {
            $contact = new Contact();
            $contact->insert([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'status' => $request->input('status'),
                'message' => $request->input('message'),
                'content' => $request->input('content'),
                'admin_note' => $request->input('admin_note'),
                'pass_to' => $request->input('pass_to'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ]);
        } catch(\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi thêm mới liên hệ: Dữ liệu nhập vào không hợp lệ');
            Log::error(' http->admin->ContactController->insertContact: Lỗi thêm mới liên hệ');
        }
    }

    private function insertAppointment($request) {
        try {
            $contact = new Contact();
            $appDateStr = $request->input('appointment_date_str');
            $appDate = null;
            if($appDateStr){
                $appDate = new \DateTime($appDateStr);
            }
            $contact->insert([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'status' => $request->input('status'),
                'message' => $request->input('message'),
                'type' => 1,
                'status' => 0,
                'admin_note' => $request->input('admin_note'),
                'appointment_date'=>$appDate,
                'order_id' => $request->input('order_id'),
                'created_at' => new \DateTime(),
                'updated_at' => new \DateTime()
            ]);
        } catch(\Exception $e) {
            Error::setErrorMessage('Lỗi xảy ra khi thêm mới liên hệ: Dữ liệu nhập vào không hợp lệ');
            Log::error(' http->admin->ContactController->insertContact: Lỗi thêm mới liên hệ');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entity\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function edit(Contact  $contact)
    {
        if (!User::isManager($this->role)) {
                return redirect('admin/home');
        }
        return View('admin.contact.edit', compact('contact'));
    }

    public function editAdvisorContact(Contact  $contact)
    {
        return View('admin.contact.edit_advisor', compact('contact'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entity\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contact  $contact)
    {
        if($request->input('type') == 0){
            $this->updateContact($contact, $request);
            return redirect(route('contact.index'));
        }else{
            $this->updateRemarketingContact($contact, $request);
            return redirect(route('contact-remarketing'));
        }
    }

    private function updateContact($contact, $request) {
        if (!User::isManager($this->role)) {
                return redirect('admin/home');
            }
        try {
            $appDateStr = $request->input('appointment_date_str');
            $appDate = null;
            if($appDateStr){
                $appDate = new \DateTime($appDateStr);
            }
            
            $contact->update([
                'name' => $request->input('name'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'address' => $request->input('address'),
                'status' => $request->input('status'),
                'message' => $request->input('message'),
                'product_id' => $request->input('product_id'),
                'content' => $request->input('content'),
                'admin_note' => $request->input('admin_note'),
                'pass_to' => $request->input('pass_to'),
                'is_ordered' => $request->has('is_ordered') ? 1 : 0,
                'updated_at' => new \DateTime()
            ]);
            
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy khi cập nhật liên hệ: Dữ liệu nhập vào không hợp lệ');
            Log::error('http->admin->ContactController->updateContact: Lỗi khi cập nhật liên hệ');
        }
    }

    private function updateRemarketingContact($contact, $request) {
        if (!User::isManager($this->role)) {
                return redirect('admin/home');
            }
        try {
            $appDateStr = $request->input('appointment_date_str');
            $appDate = null;
            if($appDateStr){
                $appDate = new \DateTime($appDateStr);
            }
            if($appDate){
                    $contact->update([
                        'name' => $request->input('name'),
                        'phone' => $request->input('phone'),
                        'email' => $request->input('email'),
                        'address' => $request->input('address'),
                        'status' => $request->input('status'),
                        'message' => $request->input('message'),
                        'product_id' => $request->input('product_id'),
                        'content' => $request->input('content'),
                        'admin_note' => $request->input('admin_note'),
                        'pass_to' => $request->input('pass_to'),
                        'is_ordered' => $request->has('is_ordered') ? 1 : 0,
                        'updated_at' => new \DateTime(),
                        'appointment_date'=>$appDate,
                        'type' => $request->input('type')

                    ]);
                }else{
                    $contact->update([
                        'name' => $request->input('name'),
                        'phone' => $request->input('phone'),
                        'email' => $request->input('email'),
                        'address' => $request->input('address'),
                        'status' => $request->input('status'),
                        'message' => $request->input('message'),
                        'product_id' => $request->input('product_id'),
                        'content' => $request->input('content'),
                        'admin_note' => $request->input('admin_note'),
                        'pass_to' => $request->input('pass_to'),
                        'is_ordered' => $request->has('is_ordered') ? 1 : 0,
                        'updated_at' => new \DateTime(),
                        'type' => $request->input('type')

                    ]);
                }
            
            
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy khi cập nhật liên hệ: Dữ liệu nhập vào không hợp lệ');
            Log::error('http->admin->ContactController->updateContact: Lỗi khi cập nhật liên hệ');
        }
    }

    public function updateAdvisorContact(Request $request) {
        try {
            $contactId = $request->input('contact_id');
            $contact = Contact::where('contact_id', $contactId)->first();
            $isOrdered = $contact->is_ordered;
            $contact->update([
                'status' => $request->input('status'),
                'content' => $request->input('content'),
                'updated_at' => new \DateTime(),
                'is_ordered' => $request->has('is_ordered') ? 1 : 0
            ]);
            if($isOrdered == 0 && $request->has('is_ordered')){
                $url = "";
                if($request->type == 1){
                    if($request->input('status') == 1){
                         $url = "/admin/contact-remarketing-done";
                     }else{
                        $url = "/admin/contact-remarketing";
                     }
                   
                }else{
                    $url = "/admin/contact";
                }
                $notifyDB = new Notification();
                $notifyDB->insert([
                   'title' => 'Đơn tư vấn',
                   'content' => 'Bạn vừa có tư vấn thành đơn',
                   'status' => '0',
                   'url' => asset($url),
                   'created_at' => new \DateTime(),
                   'updated_at' => new \DateTime()
               ]);
            }
            
        } catch (\Exception $e) {
            Error::setErrorMessage('Lỗi xảy khi cập nhật liên hệ: Dữ liệu nhập vào không hợp lệ');
            Log::error('http->admin->ContactController->updateContact: Lỗi khi cập nhật liên hệ');
        }finally{
            if($request->type == 0){
                return redirect(route('contact-advisor'));
            }else{
                return redirect(route('contact-advisor-remarketing'));
            }
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entity\Contact  $contact
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contact  $contact)
    {
        if (!User::isManager($this->role)) {
                return redirect('admin/home');
            }
        $contact->delete();

        return redirect(route('contact.index'));
    }

    private function getAdvisors() {
        try {
            $userModel = new User();

            $advisors = $userModel->select(
                    'users.id',
                    'users.role',
                    'users.name'
                )->where('users.role', 6)->orderBy('id', 'desc')->get();

            return $advisors;
        } catch (\Exception $e) {
            Log::error('http->admin->ContactController-->getAdvisors: Lỗi lấy dữ liệu advisors');

            return array();
        }
    }   
}
