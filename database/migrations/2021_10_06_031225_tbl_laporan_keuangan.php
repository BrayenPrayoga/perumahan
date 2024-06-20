<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class TblLaporanKeuangan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('laporan_keuangan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jenis_laporan', 50)->nullable();
            $table->string('keterangan', 255)->nullable();
            $table->date('tanggal');
            $table->decimal('pengeluaran',10,2)->nullable();
            $table->decimal('pemasukan', 10,2)->nullable();
            $table->decimal('saldo', 10,2)->nullable();
            $table->string('bukti', 255)->nullable();
            $table->timestamps();
            $table->softDeletes('deleted_at', 0)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('laporan_keuangan');
    }
}
