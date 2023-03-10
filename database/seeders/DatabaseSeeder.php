<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Laravolt\Indonesia\Seeds\CitiesSeeder;
use Laravolt\Indonesia\Seeds\VillagesSeeder;
use Laravolt\Indonesia\Seeds\DistrictsSeeder;
use Laravolt\Indonesia\Seeds\ProvincesSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call([
        //     ProvincesSeeder::class,
        //     CitiesSeeder::class,
        //     DistrictsSeeder::class,
        //     VillagesSeeder::class,
        // ]);
        // $this->call(RoleSeeder::class);
        // $this->call(KepengurusanSeeder::class);
        // $this->call(UserSeeder::class);
        // $this->call(KartuTandaAnggotaSeeder::class);
        $this->call(HakAksesSeeder::class);
    }
}
