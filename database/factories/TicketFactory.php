<?php

use App\Models\Process;
use App\Models\Status;
use App\Models\Ticket;
use App\Models\User;
use Faker\Generator as Faker;

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(Ticket::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'user_id' => User::inRandomOrder()->first()->id,
        'process_id' => Process::inRandomOrder()->first()->id,
        'status_id' => Status::inRandomOrder()->first()->id,
    ];
});
