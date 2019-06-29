<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    protected $table = "hasil";

    protected $fillable = ['soal_id', 'student_id', 'jawaban', 'soal_judul_id'];

    public $timestamps = false;
}
