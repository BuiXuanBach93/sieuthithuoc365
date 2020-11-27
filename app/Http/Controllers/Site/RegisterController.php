<?php

namespace App\Http\Controllers\Site;

use App\Entity\User;
use App\Entity\Notification;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Validation\Rule;

class RegisterController extends SiteController
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
        $this->middleware('guest');
    }

    public function showRegistrationForm() {
        
        return view('site.default.register');
    }
    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => [
                'required',
                'string',
                'email'
            ],
            'password' => 'required|string|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Entity\User
     */
    protected function create(array $data)
    {
        $userModel = new User();
        $userWithPhone = $userModel->where('phone', $data['phone'])
            ->orWhere('email', $data['email'])
            ->first();
        if (empty($userWithPhone)) {

            $notyDB = new Notification();
            $notyDB->insert([
               'title' => 'Người dùng mới',
               'content' => 'Vừa Có người dùng đăng ký mới',
               'status' => '0',
               'url' => asset('/admin/users'),
               'created_at' => new \DateTime(),
               'updated_at' => new \DateTime()
            ]);

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => bcrypt($data['password']),
                'phone' => isset($data['phone']) ? $data['phone'] : '',
                'role' => 1,
            ]);
        }

        $userWithPhone->where('id', $userWithPhone->id)
        ->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);

        $notyDB = new Notification();
        $notyDB->insert([
               'title' => 'Người dùng mới',
               'content' => 'Vừa Có người dùng đăng ký mới',
               'status' => '0',
               'url' => asset('/admin/users'),
               'created_at' => new \DateTime(),
               'updated_at' => new \DateTime()
           ]);

        return $userWithPhone;

    }
}
