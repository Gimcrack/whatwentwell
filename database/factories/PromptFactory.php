<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Prompt;
use App\User;
use Faker\Generator as Faker;

$factory->define(Prompt::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class),
        'question' => $faker->sentence,
        'interval' => $faker->randomElement(['DAILY','WEEKLY','MONTHLY','RANDOm']),
        'enabled' => true
    ];
});
