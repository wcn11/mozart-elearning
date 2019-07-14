<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Soal_judul extends Model
{
    protected $table = "judul_soal";

    protected $keyType = "string";
    protected $primaryKey = "kode_judul_soal";
    public $incrementing = false;

    protected $fillable = ['kode_judul_soal','tanggal_mulai', 'tanggal_selesai', 'jumlah_soal'];
    
    const CREATED_AT = "dibuat";

    const UPDATED_AT = "diupdate";

    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran', "kode_mapel", "kode_mapel");
    }

    public function Soal()
    {
        return $this->hasMany('App\Soal', "id", "id");
    }
}
