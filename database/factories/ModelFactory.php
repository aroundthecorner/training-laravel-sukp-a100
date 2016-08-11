<?php

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});

$factory->define(App\Task::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->randomElement(range(1,5)),
        'assignee_id' => $faker->randomElement(range(6,16)),
        'name' => $faker->name,
        'description' => $faker->text,
        'status' => $faker->randomElement(['New','In Progress','Done'])
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'user_id' => $faker->randomElement(range(1,2)),
        'name' => $faker->text
    ];
});