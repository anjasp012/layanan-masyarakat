<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $with = ['kategori'];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'kategori_id','id');
    }
    public function rekening()
    {
        return $this->belongsTo(RekeningBank::class, 'rekening_bank_id','id');
    }
}
