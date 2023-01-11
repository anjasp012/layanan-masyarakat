<?php

namespace Database\Seeders;

use App\Models\Kepengurusan;
use Illuminate\Database\Seeder;

class KepengurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kepengurusan::create([
            'nama_kepengurusan' => 'DPP',
        ]);
        Kepengurusan::create([
            'nama_kepengurusan' => 'DPD',
        ]);
    }
}
