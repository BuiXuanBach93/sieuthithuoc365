<?php
/**
 * Created by PhpStorm.
 * User: nam tran
 * Date: 3/21/2018
 * Time: 3:08 PM
 */

namespace App\Entity;

use Illuminate\Database\Eloquent\Model;

use App\Mail\Mail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class MailConfig extends Model
{
    use SoftDeletes;

    protected $softDelete = true;

    protected $dates = ['deleted_at'];

    protected $table = 'mail_config';

    protected $primaryKey = 'mail_config_id';

    protected $fillable = [
        'mail_config_id',
        'user_id',
        'email_send',
        'name_send',
        'email',
        'password',
        'address_server',
        'port',
        'sign',
        'method',
        'driver',
        'host',
        'email_receive',
        'encryption',
        'supplier',
        'api_key',
        'created_at',
        'updated_at'
    ];

    public static function sendMail($to = '', $subject, $content) {
//        try {
            $emailConfig = static::first();

            if (empty($emailConfig)) {
                return true;
            }
            // change config send mail
            config(['mail.host' => $emailConfig->address_server]);
            config(['mail.port' => $emailConfig->port]);
            config(['mail.from' => [
                'address' => $emailConfig->email_send,
                'name' => $emailConfig->name_send
            ]]);
            config(['mail.username' => $emailConfig->email]);
            config(['mail.password' => $emailConfig->password]);
            config(['mail.driver' => $emailConfig->driver]);
            config(['mail.encryption' => $emailConfig->encryption]);
            if ($emailConfig->method == 1) {
                // config mailGun
                config(['mail.driver' => $emailConfig->driver]);
                config(['mail.host' => $emailConfig->host]);
                config(['services.mailgun' => [
                    'domain' => $emailConfig->address_server,
                    'secret' => $emailConfig->api_key,
                ]]);
            }

            $to = (empty($to)) ? $emailConfig->email_receive : $to;
            $mail = new Mail(
                $content,
                $emailConfig->sign
            );

            \Mail::to($to)->send($mail->subject($subject));

            return true;
//        } catch (\Exception $e) {
//
//            Log::error('Entity->MainConfig->sendMail: lỗi khi gửi mail');
//
//            return false;
//        }

    }
}