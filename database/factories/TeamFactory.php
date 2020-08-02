<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Team;
use Faker\Generator as Faker;

$factory->define(Team::class, function (Faker $faker) {
    return [
        'name' => $faker->realText(20),
        'detail' => $faker->realText(70),
        'area' => $faker->prefecture,
        'main_imgpath' => 'main_image.jpg',
        'sub_imgpath' => 'sub_image.jpg',
    ];
});
