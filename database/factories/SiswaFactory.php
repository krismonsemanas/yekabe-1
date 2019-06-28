<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Siswa;
use Faker\Generator as Faker;

$factory->define(Siswa::class, function (Faker $faker) {
    return [
        'nama' => $faker->name,
        'nisn' => $faker->username,
        'kelamin' => $faker->randomElement(["LAKI-LAKI","PEREMPUAN"]),
        'agama' => $faker->randomElement(["ISLAM","KRISTEN KATOLIK","KRISTEN PROTESTAN","AGAMA KEPERCAYAAN","BUDDHA","HINDU","KONG HU CU"]),
        'tempat_lahir' => $faker->city,
        'tanggal_lahir' => $faker->date(),
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'alamat' => $faker->address,
        'ayah' => $faker->name('male'),
        'ibu' => $faker->name('female'),
        'kode_pos' => $faker->numberBetween(11111,99999),
        'photo' => null,
        'created_at' => now(),
        'updated_at' => now()
    ];
});
