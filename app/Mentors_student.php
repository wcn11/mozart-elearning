<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentors_student extends Model
{
    // protected $table = 'mentors_student';

    protected $fillable = ['date_follow'];

    public $timestamps = false;

    public function student()
    {
        return $this->hasMany('App\Student');
    }
}
