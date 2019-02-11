<?php

use Faker\Generator as Faker;
use DeveloperTasks\Model\ListTask\ListTask;

$factory->define(ListTask::class, function (Faker $faker) {
    return [
        'title' => $this->faker->name(),
        'description' => $this->faker->text($maxNbChars = 20),        
    ];
});
