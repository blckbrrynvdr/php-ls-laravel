<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * Class User
 * @package App
 * @property $name
 * @property $email
 * @property $is_admin
 * @property $notifications_email
 */
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'is_admin', 'notifications_email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isAdmin()
    {
        return $this->is_admin === 1 ? true : false;
    }

    public static function getById($id)
    {
        return self::query()->where('id','=', $id)->first();
    }

    /* @deprecated */
    public static function getAdminEmails(){
        /** @var User $admin */
        $admins = self::query()->where('is_admin','=','1')->get();
        $adminMails = [];
        foreach ($admins as $admin) {
            $adminMails[] = $admin->email;
        }
        return $adminMails;
    }

    public static function getAdmin()
    {
        return self::query()->where('is_admin', '=', 1)->first();
    }
}
