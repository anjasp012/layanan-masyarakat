<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Pelanggan extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'pelanggans';

    protected $guarded = ['id'];

    public static function next()
    {
        return static::max('id') + 1;
    }

    public function generalCleaning()
    {
        return $this->hasMany(GeneralCleaning::class);
    }

    public function layanan()
    {
        return $this->hasMany(Layanan::class);
    }

    public function pemasanganCctv()
    {
        return $this->hasMany(PemasanganCctv::class);
    }

    public function pengecatan()
    {
        return $this->hasMany(Pengecatan::class);
    }

    public function serviceAc()
    {
        return $this->hasMany(ServiceAirConditioner::class);
    }
}
