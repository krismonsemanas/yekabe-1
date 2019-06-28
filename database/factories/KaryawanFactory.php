<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use Faker\Generator as Faker;
use App\Karyawan;

$factory->define(Karyawan::class, function (Faker $faker) {
    $prodi = $faker->randomElement(["informatika","akuntansi","manajemen","pertanian","keguruan","pelayaran","bahasa","sosial politik"]);
    return [
        'nama' => $faker->name,
        'nip'=> $faker->numberBetween(100000,9999999),
        'kelamin' => $faker->randomElement(["LAKI-LAKI","PEREMPUAN"]),
        'agama' => $faker->randomElement(["ISLAM","KRISTEN KATOLIK","KRISTEN PROTESTAN","AGAMA KEPERCAYAAN","BUDDHA","HINDU","KONG HU CU"]),
        'tempat_lahir' => $faker->citySuffix.$faker->city,
        'tanggal_lahir' => $faker->date(),
        'email'=> $faker->safeEmail,
        'phone' => $faker->phoneNumber,
        'alamat' => $faker->address,
        'kode_pos' => $faker->year(),
        'tmt' => $faker->year(date('Y')),
        'sk_pertama' => $faker->year(date('Y')),
        'nuptk' => $faker->numberBetween('10000','99999'),
        'nrg' => $faker->numberBetween('10000','99999'),
        'sertifikat_pendidik' => $faker->sentence(5,true),
        'kode_sertifikat_mp' => $faker->numberBetween('10000','99999'),
        'ijazah_terakhir' => $faker->numberBetween('10000','99999'),
        'nomor_ijazah' => $faker->numberBetween('10000','99999'),
        'jurusan' => $prodi,
        'program_studi' => $prodi,
        'photo' => null,
        'stats' => 1,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
