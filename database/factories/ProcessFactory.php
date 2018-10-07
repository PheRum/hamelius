<?php

use App\Models\Process;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Process::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
