<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('role_id')->constrained('role', 'id');
            $table->foreignId('jabatan_id')->nullable()->constrained('jabatan', 'id');
            $table->string('no_kta')->nullable()->unique();
            // data diri
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('nik');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('jenis_Kelamin');
            $table->string('golongan_darah');
            $table->string('photo_diri')->nullable();

            // alamat
            $table->string('provinsi');
            $table->string('kota');
            $table->string('kecamatan');
            $table->string('kelurahan');
            $table->string('rt_rw');
            $table->string('alamat_sesuai_ktp');
            $table->string('alamat_saat_ini')->nullable();

            // lainnya
            $table->string('agama');
            $table->string('status_perkawinan');
            $table->string('pekerjaan');
            $table->string('pendidikan_terakhir');
            $table->string('email')->unique();
            $table->string('no_hp')->unique();
            $table->integer('aktif')->nullable()->comment('1 = Y, 2 = P, 0 = T');
            $table->string('password');
            // $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
