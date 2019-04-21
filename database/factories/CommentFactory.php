<?php

use Faker\Generator as Faker;

$factory->define(App\Comment::class, function (Faker $faker) {
    return [
        'user_id' => 1,
        'article_id' => 21,
        'text' => $faker->sentence
    ];
});
