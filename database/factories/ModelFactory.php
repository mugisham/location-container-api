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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
                'name'               => $faker->name,
                'email'              => $faker->safeEmail,
                'password'             => bcrypt('pass'),
                'api_token'           =>str_random(60),
                'address'           => $faker->address,
    ];
});

$factory->define(App\Container::class, function (Faker\Generator $faker) {
    return [
                'code'       => 'BDU'.$faker->ean8,
                'volume'        => rand(0, 1) ? 8000 : 9000,
                'weight'        => 9000
    ];
});

$factory->define(App\Location::class, function (Faker\Generator $faker) {
    return [
                 'name'       => $faker->name,
                'lat'        => $faker->latitude,
                'lon'        => $faker->longitude,
                'address'   => $faker->streetAddress,
                'city'       => $faker->city,
                'state'      => $faker->stateAbbr,
                'zip'        => rand(10000, 30000),
                'phone'      => $faker->phoneNumber,
    ];
});
