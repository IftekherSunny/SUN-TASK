<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
 */

use Carbon\Carbon;

$factory->define(App\Models\Task::class, function ($faker) {
    return [
        'name'          => $faker->word,
        'description'   => $faker->sentence,
        'date'          => $faker->dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'time'          => $faker->time($format = 'h : i : A')
    ];
});
