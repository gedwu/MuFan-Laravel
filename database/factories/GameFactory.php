<?php

use Faker\Generator as Faker;

$factory->define(App\Game::class, function (Faker $faker) {

    $leagueIds = \App\League::all()->pluck('id')->toArray();
    $teamsIds = \App\Team::all()->pluck('id')->toArray();
    $goalsIn = [0, 0, 1, 1, 2, 2, 2, 3, 3, 3, 4, 4, 5];
    $goalsOut = [0, 1, 2, 3, 4, 5];

    return [
        'league_id' =>  $leagueIds[array_rand($leagueIds)],
        'team_id' => $teamsIds[array_rand($teamsIds)],
        'home' => rand(0, 1),

        'goals_in' => $goalsIn[array_rand($goalsIn)],
        'goals_out' => $goalsOut[array_rand($goalsOut)],
        'start' => $faker->dateTimeThisMonth()

        //        'start' => $faker->dateTimeBetween('+1 day', '+1 month')

    ];
});


