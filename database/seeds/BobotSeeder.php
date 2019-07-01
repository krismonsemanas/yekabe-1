<?php

use Illuminate\Database\Seeder;


class BobotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bobot = [
            [
                'nama' => 'Tugas',
                'persentase' => 25,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'UTS',
                'persentase' => 30,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama' => 'Ujian Akhir',
                'persentase' => 45,
                'created_at' => now(),
                'updated_at' => now()
            ]
        ];

        DB::table('bobot_nilai')->insert($bobot);

    }
}
