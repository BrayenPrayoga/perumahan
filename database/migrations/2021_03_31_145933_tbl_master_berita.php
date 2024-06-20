<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblMasterBerita extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_berita', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('judul',255)->nullable();
            $table->string('deskripsi',255)->nullable();
            $table->string('isi',1200)->nullable();
            $table->string('gambar',255)->nullable();
            $table->integer('status')->nullable();
            $table->string('status_news',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('master_berita');
    }
}
