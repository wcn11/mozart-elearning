<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tes_pilihan extends Model
{
    protected $table = 'tes_pilihan';

    protected $fillable = ['id', 'soal_id', 'pilihan', 'pilihan_benar'];

    public function soal()
    {
        return $this->belongsTo('App\Soal');
    }
}
