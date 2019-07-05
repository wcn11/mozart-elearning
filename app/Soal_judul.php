<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal_judul extends Model
{
    protected $table = "soal_judul";

    protected $fillable = ['judul','id', 'jumlah_soal', 'waktu_pengerjaan'];
    public $incrementing = false;
    const CREATED_AT = "dibuat";

    const UPDATED_AT = "diupdate";

    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran');
    }

    public function Soal()
    {
        return $this->hasMany('App\Soal');
    }
}
