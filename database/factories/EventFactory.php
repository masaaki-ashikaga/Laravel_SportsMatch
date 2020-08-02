<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(50),
        'comment' => $faker->realText(200),
        'place' => $faker->prefecture,
        'event_start_date' => $faker->date,
        'event_start_time' => $faker->time,
        'event_end_date' => $faker->date,
        'event_end_time' => $faker->time,
        'capacity' => $faker->numberBetween(2, 100),
        'payment' => $faker->numberBetween(1, 10000),
        'apply_start_date' => $faker->date,
        'apply_start_time' => $faker->time,
        'apply_end_date' => $faker->date,
        'apply_end_time' => $faker->time,
        'event_imagepath' => 'test_event.jpg',
        'sport_id' => $faker->numberBetween(1, 8),
        'team_id' => $faker->numberBetween(1, 50)
    ];
});
