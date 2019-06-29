<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';

    protected $fillable  = ['student_id', 'nilai'];

    public $timestamps = false;
}
