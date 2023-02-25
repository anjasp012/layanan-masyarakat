<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePelanggansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pelanggans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pengurus');
            $table->string('alamat_rumah_pengurus');
            $table->string('no_hp')->unique();
            $table->string('email')->unique();
            // $table->integer('aktif')->nullable()->comment('1 = Y, 2 = P, 0 = T');
            $table->string('password');
            $table->string('photo_diri')->nullable();
            $table->string('nama_rumah_ibadah');
            $table->string('alamat_rumah_ibadah');
            $table->string('alamat_lengkap_rumah_ibadah');
            $table->string('photo_rumah_ibadah');
            $table->string('no_pelanggan')->nullable()->unique();

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
        Schema::dropIfExists('pelanggans');
    }
}
