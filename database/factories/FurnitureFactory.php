<?php

use App\Models\Furniture;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Furniture::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
    ];
});
