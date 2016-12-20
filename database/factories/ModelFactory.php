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

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\Model\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Model\Band::class, function(Faker\Generator $faker) {
    return [
        'name'         => $faker->name,
        'start_date'   => $faker->dateTimeThisDecade,
        'website'      => $faker->domainName,
        'still_active' => $faker->boolean,
    ];
});

$factory->define(App\Model\Album::class, function(Faker\Generator $faker) {
    return [
        'name'             => $faker->name,
        'recorded_date'    => $faker->dateTimeThisDecade,
        'release_date'     => $faker->dateTimeThisDecade,
        'number_of_tracks' => $faker->numberBetween(1, 50),
        'label'            => $faker->name,
        'producer'         => $faker->name,
        'genre'            => $faker->name,
    ];
});