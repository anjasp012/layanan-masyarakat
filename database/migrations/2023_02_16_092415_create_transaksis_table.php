<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->boolean('jenis');
            $table->foreignId('kategori_id')->constrained('kategoris', 'id');
            $table->string('nominal');
            $table->text('keterangan');
            $table->string('bukti_transaksi');
            $table->foreignId('rekening_bank_id')->constrained('rekening_banks', 'id');
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
        Schema::dropIfExists('transaksis');
    }
}
