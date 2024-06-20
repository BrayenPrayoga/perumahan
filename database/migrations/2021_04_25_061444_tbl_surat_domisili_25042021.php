<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblSuratDomisili25042021 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_domisili', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_users')->nullable();
            $table->string('nama',100)->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('tgl_lahir',20)->nullable();
            $table->string('agama',10)->nullable();
            $table->integer('status')->nullable();
            $table->string('catatan',255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_domisili');
    }
}
