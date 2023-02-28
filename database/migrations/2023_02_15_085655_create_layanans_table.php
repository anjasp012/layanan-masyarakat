<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLayanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pelanggan_id')->constrained('pelanggans', 'id');
            $table->string('nama_pemohon');
            $table->string('nama_rumah_ibadah');
            $table->string('alamat_rumah_ibadah');
            $table->dateTime('tanggal_jam_pelaksanaan');
            $table->string('titik_lokasi_akurat');
            $table->text('kolom_komentar');
            $table->string('file_pendukung');
            $table->boolean('aprove_humas')->nullable();
            $table->boolean('aprove_korlap')->nullable();
            $table->boolean('aprove_admin')->nullable();
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
        Schema::dropIfExists('layanans');
    }
}
