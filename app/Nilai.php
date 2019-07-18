<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $table = 'nilai';
    protected $primaryKey = 'kode_nilai';
    public $keyType = 'string';

    protected $fillable  = ['kode_nilai','id_student', 'kode_judul_soal', 'nilai', "status"];

    const CREATED_AT = "tanggal_selesai";

    const UPDATED_AT = "tanggal_update";

    public function judul_soal(){
        return $this->belongsTo("App\Soal_judul", "kode_judul_soal");
    }
}
