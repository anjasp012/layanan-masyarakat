<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role_id' => 1,
            'nama_lengkap' => 'admin',
            'nama_panggilan' => 'admin',
            'nik' => '678998656876',
            'tempat_lahir' => 'klaten',
            'tanggal_lahir' => now(),
            'jenis_Kelamin' => 'Laki Laki',
            'golongan_darah' => 'B',
            // 'photo_diri',
            'provinsi' => 'Jawa Tengah',
            'kota' => 'Klaten',
            'kecamatan' => 'Ceper',
            'kelurahan' => 'Klepu',
            'rt_rw' => '03/05',
            'alamat_sesuai_ktp' => 'Krenekan',
            // 'alamat_saat_ini',
            'agama' => 'ISLAM',
            'status_perkawinan' => 'BELUM KAWIN',
            'pekerjaan' => 'Pelajar',
            'pendidikan_terakhir' => 'SMK',
            'email' => 'admin@gmail.com',
            'no_hp' => '089529591731',
            'aktif' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role_id' => 3,
            'nama_lengkap' => 'anjas putra',
            'nama_panggilan' => 'anjas',
            'nik' => '678998656876',
            'tempat_lahir' => 'klaten',
            'tanggal_lahir' => now(),
            'jenis_Kelamin' => 'Laki Laki',
            'golongan_darah' => 'B',
            // 'photo_diri',
            'provinsi' => 'Jawa Tengah',
            'kota' => 'Klaten',
            'kecamatan' => 'Ceper',
            'kelurahan' => 'Klepu',
            'rt_rw' => '03/05',
            'alamat_sesuai_ktp' => 'Krenekan',
            // 'alamat_saat_ini',
            'agama' => 'ISLAM',
            'status_perkawinan' => 'BELUM KAWIN',
            'pekerjaan' => 'Pelajar',
            'pendidikan_terakhir' => 'SMK',
            'email' => 'anjas@gmail.com',
            'no_hp' => '089529591732',
            'aktif' => 2,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role_id' => 3,
            'nama_lengkap' => 'anjas putra 2',
            'nama_panggilan' => 'anjas 2',
            'nik' => '678998656876',
            'tempat_lahir' => 'klaten',
            'tanggal_lahir' => now(),
            'jenis_Kelamin' => 'Laki Laki',
            'golongan_darah' => 'B',
            // 'photo_diri',
            'provinsi' => 'Jawa Tengah',
            'kota' => 'Klaten',
            'kecamatan' => 'Ceper',
            'kelurahan' => 'Klepu',
            'rt_rw' => '03/05',
            'alamat_sesuai_ktp' => 'Krenekan',
            // 'alamat_saat_ini',
            'agama' => 'ISLAM',
            'status_perkawinan' => 'BELUM KAWIN',
            'pekerjaan' => 'Pelajar',
            'pendidikan_terakhir' => 'SMK',
            'email' => 'anjas2@gmail.com',
            'no_hp' => '089529591733',
            'aktif' => 0,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        User::create([
            'role_id' => 3,
            'nama_lengkap' => 'anjas putra 3',
            'nama_panggilan' => 'anjas 3',
            'nik' => '678998656876',
            'tempat_lahir' => 'klaten',
            'tanggal_lahir' => now(),
            'jenis_Kelamin' => 'Laki Laki',
            'golongan_darah' => 'B',
            // 'photo_diri',
            'provinsi' => 'Jawa Tengah',
            'kota' => 'Klaten',
            'kecamatan' => 'Ceper',
            'kelurahan' => 'Klepu',
            'rt_rw' => '03/05',
            'alamat_sesuai_ktp' => 'Krenekan',
            // 'alamat_saat_ini',
            'agama' => 'ISLAM',
            'status_perkawinan' => 'BELUM KAWIN',
            'pekerjaan' => 'Pelajar',
            'pendidikan_terakhir' => 'SMK',
            'email' => 'anjas3@gmail.com',
            'no_hp' => '089529591734',
            'aktif' => 1,
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
    }
}
