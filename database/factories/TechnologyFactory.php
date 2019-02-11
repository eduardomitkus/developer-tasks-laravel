<?php

use Faker\Generator as Faker;
use DeveloperTasks\Model\Technology\Technology;

$factory->define(Technology::class, function (Faker $faker) {
    return [
        'name' => $this->faker->name(),
        'platform' => $this->faker->firstName(),
    ];
});
