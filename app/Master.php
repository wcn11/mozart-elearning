<?php

namespace App;

use App\Notifications\Master\MasterResetPassword;
use App\Notifications\Master\MasterVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Master extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $keyType = "string";

    protected $primaryKey = "username";
    public $timestamps = false;
    public $incrementing = false;

    protected $table = "master";
    
    protected $fillable = [
        'username', 'password',
    ];

    // /**
    //  * The attributes that should be hidden for arrays.
    //  *
    //  * @var array
    //  */
    // protected $hidden = [
    //     'password', 'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast to native types.
    //  *
    //  * @var array
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    // ];

    // /**
    //  * Send the password reset notification.
    //  *
    //  * @param  string  $token
    //  * @return void
    //  */
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new MasterResetPassword($token));
    // }

    // /**
    //  * Send the email verification notification.
    //  *
    //  * @return void
    //  */
    // public function sendEmailVerificationNotification()
    // {
    //     $this->notify(new MasterVerifyEmail);
    // }

}
