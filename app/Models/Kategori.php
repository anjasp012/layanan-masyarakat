<?php

namespace App\Models;

use App\Http\Controllers\LaporanController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function laporan()
    {
        return $this->hasMany(Transaksi::class, 'id');
    }
}
