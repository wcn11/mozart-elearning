<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMateriTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materi', function (Blueprint $table) {
            $table->string('kode_materi', 25)->primary();
            $table->string('id_mentor');
            $table->string('kode_mapel');
            $table->string('judul_materi');
            $table->string('cover')->default(public_path("/images/cover_materi_default.jpg"))->change();
            $table->longText('materi');
            $table->dateTime("dibuat")->useCurrent();
            $table->dateTime("diupdate")->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('materi');
    }
}
