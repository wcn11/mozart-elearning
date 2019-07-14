<?php

namespace App;

use App\Notifications\Mentor\MentorResetPassword;
use App\Notifications\Mentor\MentorVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Mentor extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $keyType = "string";
    protected $primaryKey = "id_mentor";
    public $incrementing = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_mentor','name', 'email', 'password', 'foto',
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

    /**
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new MentorResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new MentorVerifyEmail);
    }

    public function student()
    {
        return $this->belongsToMany('App\Student', "mentor_student", "id_student", "id_student");
    }
}
