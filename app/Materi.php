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

    const CREATED_AT = "dibuat";

    const UPDATED_AT = "diupdate";

    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran', "kode_mapel", "kode_mapel");
    }

    public function mentor()
    {
        return $this->belongsTo('App\Pelajaran', "id_mentor");
    }

    public function materi_ke_mentor()
    {
        return $this->belongsTo('App\Mentor', "id_mentor");
    }
}
