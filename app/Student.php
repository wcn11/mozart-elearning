<?php

namespace App;

use App\Notifications\Student\StudentResetPassword;
use App\Notifications\Student\StudentVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class Student extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;
    // protected $table = "students";
    public $incrementing = false;

    protected $primaryKey = "id_student";

    protected $keyType = 'string';

    const CREATED_AT = "tanggal_daftar";

    const UPDATED_AT = "diupdate";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id_student','name', 'email', 'password', "socialite_id", "socialite_name", "foto"
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', "provider_id", "provider_name"
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
        $this->notify(new StudentResetPassword($token));
    }

    /**
     * Send the email verification notification.
     *
     * @return void
     */
    public function sendEmailVerificationNotification()
    {
        $this->notify(new StudentVerifyEmail);
    }

    public function mentor()
    {
        return $this->belongsToMany('App\Mentor',"App\Mentors_student", "id_student", "id_mentor");
    }
    // public function mentors_student()
    // {
    //     return $this->belongsToMany('App\Mentor_students');
    // }

    public function jumlah_student()
    {
        return $this->belongsToMany('App\Mentor', "Mentor_student", "id_student", "id_student");
    }

    public function pelajaran()
    {
        return $this->belongsToMany('App\Pelajaran', "App\Pelajaran_student", "id_student", "kode_mapel");
    }
}
