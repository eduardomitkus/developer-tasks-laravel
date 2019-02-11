<?php

use Faker\Generator as Faker;
use \DeveloperTasks\Model\Developer\Developer;

$factory->define(Developer::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name(),
        'nick_name' => $this->faker->firstName(),
        'email' => $email = $this->faker->email(),
        'password' => Hash::make('teste')
    ];
});
