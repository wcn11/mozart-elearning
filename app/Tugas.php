<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tugas extends Model
{
    protected $table = "tugas";

    protected $fillable = ['id', 'judul', 'tugas', 'pelajaran_id', 'deadline_tanggal', 'deadline_waktu', 'nilai', 'status'];


    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran');
    }
}
