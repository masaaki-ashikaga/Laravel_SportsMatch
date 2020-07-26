<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'comment' => $faker->text,
        'place' => $faker->prefecture,
        'event_start_date' => $faker->date,
        'event_start_time' => $faker->time,
        'event_end_date' => $faker->date,
        'event_end_time' => $faker->time,
        'capacity' => $faker->numberBetween(2, 100),
        'application' => $faker->numberBetween(2, 100),
        'payment' => $faker->numberBetween(1, 10000),
        'reception_status' => $faker->boolean,
        'apply_start_date' => $faker->date,
        'apply_start_time' => $faker->time,
        'apply_end_date' => $faker->date,
        'apply_end_time' => $faker->time,
        'event_imagepath' => $faker->url,
    ];
});
