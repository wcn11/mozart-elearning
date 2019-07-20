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
        'id_mentor','name', 'email', "kuota", 'password', 'foto',
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
        return $this->belongsToMany('App\Student', "App\Mentors_student", "id_mentor", "id_student");
    }

    public function pelajaran()
    {
        return $this->hasMany('App\Pelajaran', "id_mentor");
    }

    public function materi()
    {
        return $this->hasMany('App\Materi', "id_mentor");
    }

    public function judul_soal()
    {
        return $this->hasMany('App\Soal_judul', "id_mentor");
    }
    
    public function kjs_ke_mentor(){
        return $this->belongsTo("App\Soal_judul","id_mentor");
    }
    
    public function materi_ke_mentor(){
        return $this->belongsTo("App\Materi","id_mentor");
    }

    // public function jumlah_student()
    // {
    //     return $this->belongsToMany('App\Student', "Mentor_student", "id_student", "id_student");
    // }
}
