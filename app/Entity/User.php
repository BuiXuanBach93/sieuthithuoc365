<?php

namespace App\Entity;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Log;

class User extends Authenticatable
{
    use SoftDeletes;

    protected $softDelete = true;

    protected $dates = ['deleted_at'];

    protected $table = 'users';

    // thành viên
    protected static $member = 1;
    // Biên tập viên
    protected static $editor = 2;
    // Quản lý
    protected static $manager = 3;
    // Creater
    protected static $creater = 4;
    // Stocker
    protected static $stocker = 5;
     // adviser
    protected static $advisor = 6;


    // Rest omitted for brevity

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }

    public static function isManager($role) {
        if ($role == User::$manager || $role == User::$creater) {
            return true;
        }

        return false;
    }

    public static function isEditor($role) {
        if ($role == User::$editor) {
            return true;
        }

        return false;
    }

    public static function isMember($role) {
        if ($role == User::$member) {
            return true;
        }

        return false;
    }

    public static function isCreater($role) {
        if ($role == User::$creater) {
            return true;
        }

        return false;
    }

    public static function isStocker($role) {
        if ($role == User::$stocker) {
            return true;
        }

        return false;
    }

    public static function isAdvisor($role) {
        if ($role == User::$advisor) {
            return true;
        }

        return false;
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',  'accesstoken', 'email', 'role', 'password', 'image', 'point', 'vip', 'user_id', 'theme_code', 'user_email', 'vip',
        'deleted_at', 'phone', 'address', 'created_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function getBackOfficeUsers() {
        try {
            $users = static::select('id', 'name')->orderBy('id', 'desc')
                ->where('role', '>=', 2)->get();

            return $users;
        } catch (\Exception $e) {
            Log::error('Entity->User->getAllUser: Lỗi lấy tất cả user');
            return null;
        }
    }

    public static function getAdvisors() {
        try {
            $users = static::select('id', 'name')->orderBy('id', 'desc')
                ->where('role', '=', 6)->get();

            return $users;
        } catch (\Exception $e) {
            Log::error('Entity->User->getAdvisors: Lỗi lấy advisors');
            return null;
        }
    }

    public static function getUserComment() {
        try {
            $userModel = new User();

            $users = $userModel->select('id', 'email')
                ->orderBy('id', 'desc')
                ->where('role', '<=', 3)
                ->get();

            return $users;
        } catch (\Exception $e) {
            Log::error('Entity->User->getAllUser: Lỗi lấy tất cả user');
            return null;
        }
    }
}
