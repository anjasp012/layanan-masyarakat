<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function pelanggan()
    {
        return $this->belongsTo(Pelanggan::class, 'id', 'user_id');
    }
}
