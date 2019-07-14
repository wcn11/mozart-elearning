<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "materi";

    protected $fillable = ['kode_materi', 'judul_materi', 'cover', 'materi'];

    protected $keyType = "string";
    protected $primaryKey = "kode_materi";
    public $incrementing = false;

    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran', "kode_mapel", "kode_mapel");
    }
}
