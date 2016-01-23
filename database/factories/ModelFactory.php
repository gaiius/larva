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
        'username' => $faker->userName,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => ucfirst($faker->word),
    ];
});

$factory->define(App\Forum::class, function (Faker\Generator $faker) {
    return [
        'name' => ucfirst($faker->word) . ' ' . $faker->word,
        'description' => $faker->sentence(),
        'category' => rand(1, 4)
    ];
});

$factory->define(App\Thread::class, function (Faker\Generator $faker) {
    return [
        'title' => mb_convert_case(implode(' ', $faker->words(rand(1, 9))), MB_CASE_TITLE),
        'author' => rand(1, 15),
        'forum' => rand(1, 10),
        'body' => $faker->text(),
    ];
});

$factory->define(App\Reply::class, function (Faker\Generator $faker) {
    return [
        'author' => rand(1, 15),
        'thread' => rand(1, 50),
        'body' => $faker->text(),
    ];
});
