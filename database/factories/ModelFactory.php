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

$factory->define(codeproject\Entities\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(codeproject\Entities\Client::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'responsible' => $faker->name,
        'email' => $faker->email,
        'phone' => $faker->phoneNumber,
        'adress' => $faker->address,
        'obs' => $faker->sentence,
    ];
});

$factory->define(codeproject\Entities\Project::class, function (Faker\Generator $faker) {
    return [
        'owner_id' => rand(1,10),
        'client_id' => rand(1,10),
        'name' => $faker->name,
        'description' => $faker->sentence,
        'progress' => $faker->text,
        'status' => $faker->text,
        'due_date' => $faker->date
    ];
});


$factory->define(codeproject\Entities\ProjectNote::class, function (Faker\Generator $faker) {
    return [
        'project_id' => rand(1,10),
        'title' => $faker->word,
        'note' => $faker->paragraph,
    ];
});
