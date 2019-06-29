<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal_pilihan extends Model
{
    protected $table = 'soal_pilihan';

    protected $fillable = ['id', 'soal_id', 'pilihan1', 'pilihan2', 'pilihan3', 'pilihan4', 'pilihan5', 'pilihan_benar', 'penjelasan'];

    public function soal()
    {
        return $this->belongsTo('App\Soal');
    }
}
