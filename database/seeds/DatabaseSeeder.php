<?php

use Illuminate\Database\Seeder;
use App\Mapel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AdminSeeder::class);
        $this->call(KaryawanSeeder::class);
        $this->call(SiswaSeeder::class);
        $this->call(PeriodeSeeder::class);
        $this->call(MapelSeeder::class);
        $this->call(KelasSeeder::class);
        $this->call(MuridSeeder::class);
        $this->call(GuruSeeder::class);
        $this->call(BobotSeeder::class);
    }
}
