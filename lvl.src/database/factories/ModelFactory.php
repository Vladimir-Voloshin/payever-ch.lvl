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
use App\User as PayeverUser;

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'created_at' => $faker->dateTime,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->defineAs(App\User::class, 'supervisor', function (Faker\Generator $faker) use ($factory)  {
    $user = $factory->raw(App\User::class);

    return array_merge($user, [
        'email' => 'super@example.com',
        'password' => bcrypt('9988555d'),
        'rank' => PayeverUser::SUPERVISOR,
    ]);
});

$factory->define(App\Album::class, function (Faker\Generator $faker){
    return [
        'album_name' => $faker->word,
        'created_at' => $faker->dateTime,
        'user_id'    => 1,
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker){
    return [
        'image_name' => 'favicon.ico',
        'created_at' => $faker->dateTime,
        'album_id'    => 1,
    ];
});