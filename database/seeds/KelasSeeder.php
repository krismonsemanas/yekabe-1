<?php

use Illuminate\Database\Seeder;
use App\Kelas;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $daftarKelas = ["10 IPA 1","10 IPS 1","10 IPS 2","10 IPS 3","11 IPA 1","11 IPS 1", "11 IPS 2","11 IPS 3","12 IPA 1","12 IPS 1","12 IPS 2","12 IPS 3"];
        $insert = [];
        foreach($daftarKelas as $kelas){
            $insert[] = ["stats" => 1, "kelas" => $kelas, "created_at"=>now(),"updated_at"=>now()];
        };
        DB::table('kelas')->insert($insert);
    }
}
