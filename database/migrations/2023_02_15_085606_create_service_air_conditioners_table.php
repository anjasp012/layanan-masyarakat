<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceAirConditionersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_air_conditioners', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pemohon');
            $table->string('nama_rumah_ibadah');
            $table->string('alamat_rumah_ibadah');
            $table->dateTime('tanggal_jam_pelaksanaan');
            $table->string('titik_lokasi_akurat');
            $table->boolean('ada_persediaan_tangga');
            $table->integer('jumlah_service');
            $table->boolean('ada_ac_rucak');
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
        Schema::dropIfExists('service_air_conditioners');
    }
}
