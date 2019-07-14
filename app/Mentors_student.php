<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mentors_student extends Model
{
    // protected $table = 'mentors_student';

    protected $fillable = ['id_mentor', 'id_student', 'date_follow'];

    public $timestamps = false;

    public function student()
    {
        return $this->hasMany('App\Student', "id_student", "id_student");
    }
}
