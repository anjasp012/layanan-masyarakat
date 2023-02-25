<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePengecatansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengecatans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('nama_rumah_ibadah');
            $table->string('alamat_rumah_ibadah');
            $table->dateTime('tanggal_jam_pelaksanaan');
            $table->string('titik_lokasi_akurat');
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
        Schema::dropIfExists('pengecatans');
    }
}
