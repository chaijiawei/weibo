<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\MicroBlog;
use Faker\Generator as Faker;

$factory->define(MicroBlog::class, function (Faker $faker) {
    $dateTime = $faker->dateTimeThisYear;
    return [
        'content' => $faker->text,
        'created_at' => $dateTime,
        'updated_at' => $dateTime,
    ];
});
