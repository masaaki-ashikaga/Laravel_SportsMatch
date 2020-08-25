<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Event;
use Faker\Generator as Faker;

$factory->define(Event::class, function (Faker $faker) {
    return [
        'title' => $faker->realText(50),
        'comment' => $faker->realText(200),
        'prefecture' => $faker->prefecture,
        'venue' => $faker->realText(10),
        'address' => $faker->address,
        'event_start_date' => $faker->dateTimeBetween('-1 week', '+1 week'),
        'event_start_time' => $faker->time,
        'event_end_date' => $faker->dateTimeBetween('+1 week', '+2 week'),
        'event_end_time' => $faker->time,
        'capacity' => $faker->numberBetween(2, 100),
        'payment' => $faker->numberBetween(1, 10000),
        'apply_end_date' => $faker->dateTimeBetween('-2week', '-1 week'),
        'apply_end_time' => $faker->time,
        'event_imagepath' => 'test_event.jpg',
        'public' => $faker->numberBetween(0, 1),
        'sport_id' => $faker->numberBetween(1, 8),
        'team_id' => $faker->numberBetween(1, 20)
    ];
});
