<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    // protected $guarded = ['id'];

    protected $fillable = [
        'role_id', 'jabatan', 'kepengurusan_id', 'no_kta', 'nama_lengkap', 'aktif', 'nama_panggilan', 'nik', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'golongan_darah', 'photo_diri', 'id_provinsi', 'id_kota', 'id_kecamatan', 'id_kelurahan', 'rt_rw', 'alamat_sesuai_ktp', 'alamat_saat_ini', 'agama', 'status_perkawinan', 'pekerjaan', 'pendidikan_terakhir', 'email', 'no_hp', 'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function next()
    {
        return static::max('id') + 1;
    }

    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }

    public function kepengurusan()
    {
        return $this->belongsTo(kepengurusan::class, 'kepengurusan_id');
    }
}
