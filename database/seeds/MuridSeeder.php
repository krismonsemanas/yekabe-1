<?php

use Illuminate\Database\Seeder;

use App\Murid;
use App\Siswa;
use App\Guru;
use App\Periode;
use App\Kelas;
use App\Mapel;


class MuridSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $siswa = Siswa::all();
        $periode = Periode::all();
        $mapel = Mapel::all();
        $kelas = Kelas::all();
        
        foreach($siswa as $item){
            $item->murid()->create([
                'periode_id' => $periode->random()->id,
                'mapel_id' => $mapel->random()->id,
                'kelas_id' => $kelas->random()->id,
                'active' => 1
            ]);
        }
    }
}
