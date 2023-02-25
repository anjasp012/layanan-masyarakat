<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WilayahDpd extends Model
{
    use HasFactory;

    protected $table = 'wilayah_dpd';

    protected $fillable = [
        'nama',
        'slug',
    ];

    protected $with = ['anggota'];

    public function anggota()
    {
        return $this->hasMany(User::class, 'wilayah_dpd_id');
    }
}
