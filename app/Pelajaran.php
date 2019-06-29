<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $table = "pelajaran";

    protected $fillable = ['id', 'nama_pelajaran'];



    public function materi()
    {
        return $this->hasOne('App\Materi');
    }

    public function tugas()
    {
        return $this->hasOne('App\Tugas');
    }

    public function soal()
    {
        return $this->hasOne('App\Soal');
    }

    // public function video()
    // {
    //     return $this->hasOne('App\Video');
    // }

    // public function soal_judul()
    // {
    //     return $this->hasOne('App\Soal_judul');
    // }
}
