<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblBiografiKetua extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('biografi_ketua', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',255)->nullable();
            $table->string('image',255)->nullable();
            $table->string('deskripsi',255)->nullable();
            $table->string('biografi',1200)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('biografi_ketua');
    }
}
