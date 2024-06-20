<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblDataCovid extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('data_covid', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_provinsi',10)->nullable();
            $table->string('shortlabel',10)->nullable();
            $table->string('label',100)->nullable();
            $table->float('jumlah_kasus',150)->nullable();
            $table->float('jumlah_sembuh',150)->nullable();
            $table->float('jumlah_meninggal',150)->nullable();
            $table->float('jumlah_dirawat',150)->nullable();
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
        Schema::dropIfExists('data_covid');
    }
}
