<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralCleaningsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_cleanings', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('nama_rumah_ibadah');
            $table->string('alamat_rumah_ibadah');
            $table->dateTime('tanggal_jam_pelaksanaan');
            $table->string('titik_lokasi_akurat');
            $table->boolean('ada_persediaan_tangga');
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
        Schema::dropIfExists('general_cleanings');
    }
}
