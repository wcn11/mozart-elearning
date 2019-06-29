<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "materi";

    protected $fillable = ['id', 'judul_materi', 'materi'];


    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran');
    }
}
