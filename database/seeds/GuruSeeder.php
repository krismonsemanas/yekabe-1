<?php

use Illuminate\Database\Seeder;
use App\Karyawan;
use App\Periode;
use App\Mapel;
use App\Kelas;


class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periode = Periode::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        $karyawan = Karyawan::all();
        foreach($karyawan as $guru){
            $guru->guru()->create([
                'periode_id' => $periode->random()->id,
                'kelas_id' => $kelas->random()->id,
                'mapel_id' => $mapel->random()->id,
                'active' => 1
            ]);
        }
    }
}
