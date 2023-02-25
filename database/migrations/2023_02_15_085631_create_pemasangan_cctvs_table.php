<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePemasanganCctvsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pemasangan_cctvs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('nama_rumah_ibadah');
            $table->string('alamat_rumah_ibadah');
            $table->dateTime('tanggal_jam_pelaksanaan');
            $table->string('titik_lokasi_akurat');
            $table->boolean('ada_persediaan_tangga');
            $table->integer('jumlah_pasang');
            $table->string('file_pendukung');
            $table->string('status_aprove')->nullable();
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
        Schema::dropIfExists('pemasangan_cctvs');
    }
}
