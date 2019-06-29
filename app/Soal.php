<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    protected $table = 'soal';

    protected $fillable = ['id', 'soal_judul_id', 'mentor_id', 'pertanyaan', 'pilihan1', 'pilihan2', 'pilihan3', 'pilihan4', 'pilihan5', 'pilihan_benar'];

    public function soal_pilihan()
    {
        return $this->hasMany('App\Soal_pilihan');
    }
    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran');
    }
    public function Soal_judul()
    {
        return $this->belongsTo('App\Soal_judul');
    }
}
