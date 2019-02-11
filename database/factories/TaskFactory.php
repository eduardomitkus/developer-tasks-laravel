<?php

use Faker\Generator as Faker;
use DeveloperTasks\Model\Task\Task;

$factory->define(Task::class, function (Faker $faker) {
    return [
        'title' => $this->faker->name(),
        'description' => $this->faker->text($maxNbChars = 20),
        'create_date' => date('Y-m-d')
    ];
});
