<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Mapel;
use Faker\Generator as Faker;

$factory->define(Mapel::class, function (Faker $faker) {
    return [
        "mapel" => $faker->company,
        "stats" => 1
    ];
});
