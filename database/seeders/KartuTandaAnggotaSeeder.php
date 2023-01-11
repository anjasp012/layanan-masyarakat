<?php

namespace Database\Seeders;

use App\Models\KartuTandaAnggota;
use Illuminate\Database\Seeder;

class KartuTandaAnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KartuTandaAnggota::create([
            'kta_depan' => '1',
            'kta_belakang' => '1',
        ]);
    }
}
