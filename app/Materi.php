<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    protected $table = "materi";

    protected $fillable = ['id', 'judul_materi', 'cover', 'materi'];
    public $incrementing = false;

    public function pelajaran()
    {
        return $this->belongsTo('App\Pelajaran');
    }
}
