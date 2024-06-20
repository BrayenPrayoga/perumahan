<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblSuratMenikah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_menikah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_users')->nullable();
            $table->string('hari',10)->nullable();
            $table->string('tanggal',20)->nullable();
            $table->string('nama_kua',100)->nullable();
            $table->string('kecamatan',100)->nullable();
            $table->string('walikota',100)->nullable();
            $table->string('provinsi',100)->nullable();
            $table->string('status_nikah',20)->nullable();
            $table->integer('status')->nullable();
            $table->string('catatan',255)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_menikah');
    }
}
