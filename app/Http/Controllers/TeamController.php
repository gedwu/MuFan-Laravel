<?php

namespace App\Http\Controllers;

use App\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function add_england_team() {
        $england_id = \App\Country::where('name_short', 'eng')->first()->id;

        $englandTeams = [
          [
              'name' => 'Londono Arsenal',
              'name_short' => 'ARS ',
              'photo' => 'Arsenal.png'
          ],
            [
                'name' => 'EVerton',
                'name_short' => 'EVE  ',
                'photo' => 'Everton.png'
            ],
            [
                'name' => 'Leicester City',
                'name_short' => 'LEI  ',
                'photo' => 'Leicester.png'
            ],
            [
                'name' => 'Liverpool',
                'name_short' => 'LIV ',
                'photo' => 'Liverpool.png'
            ],
            [
                'name' => 'Londono Chelsea',
                'name_short' => 'CHE  ',
                'photo' => 'LondonChelsea.png'
            ],
            [
                'name' => 'Mančesterio City',
                'name_short' => 'MCI  ',
                'photo' => 'ManchesterCIty.png'
            ],
            [
                'name' => 'Watford',
                'name_short' => 'WAT  ',
                'photo' => 'Watford.png'
            ],
        ];

        foreach ($englandTeams as $team) {
            Team::create([
                'country_id' => $england_id,
                'name' => $team['name'],
                'name_short' => $team['name_short'],
                'photo' => $team['photo'],
            ]);
        }
    }
}
