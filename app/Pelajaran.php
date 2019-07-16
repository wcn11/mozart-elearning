<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelajaran extends Model
{
    protected $keyType = "string";
    protected $primaryKey = "kode_mapel";
    public $incrementing = false;

    protected $table = "pelajaran";

    protected $fillable = ['kode_mapel','id_mentor', 'nama_pelajaran'];



    public function materi()
    {
        return $this->belongsTo('App\Materi', "kode_mapel", "kode_mapel");
    }

    public function soal()
    {
        return $this->hasOne('App\Soal');
    }

    public function mentor()
    {
        return $this->belongsToMany('App\Mentor', "id_mentor");
    }

    public function soal_judul()
    {
        return $this->belongsTo('App\Soal_judul', "kode_mapel", "kode_mapel");
    }

    public function student()
    {
        return $this->belongsToMany('App\Student', "App\Pelajaran_student", "kode_mapel", "id_student");
    }
}
