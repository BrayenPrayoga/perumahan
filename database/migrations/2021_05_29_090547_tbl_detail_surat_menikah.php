<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDetailSuratMenikah extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('detail_surat_menikah', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_menikah')->nullable();
            $table->string('nama',50)->nullable();
            $table->string('tempat_lahir',100)->nullable();
            $table->string('jenis_kelamin',10)->nullable();
            $table->string('tgl_lahir',20)->nullable();
            $table->string('bin_binti',50)->nullable();
            $table->string('agama',20)->nullable();
            $table->string('pekerjaan',255)->nullable();
            $table->string('alamat',255)->nullable();
            $table->integer('nik_ktp')->nullable();
            $table->string('data',10)->nullable();
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
        Schema::dropIfExists('detail_surat_menikah');
    }
}
