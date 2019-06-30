<?php

use Illuminate\Database\Seeder;
use App\Periode;

class PeriodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodes = [
            [
                "tahun_ajaran" => "2010/2011",
                "semester" => "GANJIL",
                "stats" => 1,
            ],
            [
                "tahun_ajaran" => "2010/2011",
                "semester" => "GENAP",
                "stats" => 1,
            ],
            [
                "tahun_ajaran" => "2011/2012",
                "semester" => "GANJIL",
                "stats" => 1,
            ],
            [
                "tahun_ajaran" => "2011/2012",
                "semester" => "GENAP",
                "stats" => 1,
            ],
            [
                "tahun_ajaran" => "2012/2013",
                "semester" => "GANJIL",
                "stats" => 1,
            ],
            [
                "tahun_ajaran" => "2012/2013",
                "semester" => "GENAP",
                "stats" => 1,
            ],
        ];

        foreach($periodes as $periode){
            Periode::create($periode);
        }
    }
}
