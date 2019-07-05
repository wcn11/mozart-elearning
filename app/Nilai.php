<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';

    protected $fillable  = ['student_id', 'soal_judul_id', 'nilai'];

    const CREATED_AT = "tanggal_selesai";

    const UPDATED_AT = "tanggal_update";
}
