<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KartuTandaAnggota extends Model
{
    use HasFactory;
    protected $table = 'kartu_tanda_anggotas';

    protected $fillable = ['kta_depan', 'kta_belakang'];
}
