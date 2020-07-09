<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Preferences;
use App\User;
use Faker\Generator as Faker;

$factory->define(Preferences::class, function (Faker $faker) {
    return [
        'user_id' => factory(User::class)
    ];
});
