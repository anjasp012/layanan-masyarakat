<?php

namespace Database\Seeders;

use App\Models\HakAkses;
use Illuminate\Database\Seeder;

class HakAksesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HakAkses::create([
            'nama_hak_akses' => 'BENDAHARA',
        ]);
        HakAkses::create([
            'nama_hak_akses' => 'HUMAS',
        ]);
        HakAkses::create([
            'nama_hak_akses' => 'KORLAP',
        ]);
    }
}
