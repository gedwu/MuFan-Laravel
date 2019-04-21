<?php

namespace App\Http\Controllers;

use App\League;

class LeagueController extends Controller
{
    public function create_leagues() {

        $leagues = [
            [
                'name' => 'Anglijos Premier Lyga',
                'name_short' => 'EPL',
                'photo' => 'EPL.png'
            ],
            [
                'name' => 'FA Taurė',
                'name_short' => 'FAC',
                'photo' => 'FAC.png'
            ],
            [
                'name' => 'Lygos Taurė',
                'name_short' => 'LEC',
                'photo' => 'league.png'
            ],
            [
                'name' => 'Bendruominės skydas',
                'name_short' => 'COS',
                'photo' => 'league.png'
            ],
            [
                'name' => 'Čempionų Lyga',
                'name_short' => 'UCL',
                'photo' => 'UCL.png'
            ],
            [
                'name' => 'Europos Lyga',
                'name_short' => 'UEL',
                'photo' => 'EL.png'
            ],
            [
                'name' => 'Čempionų Taurė',
                'name_short' => 'ICC',
                'photo' => 'ICC.png'
            ],
            [
                'name' => 'Draugiškos rungtynės',
                'name_short' => 'CLF',
                'photo' => 'CLF.png'
            ],
        ];

        foreach ($leagues as $league) {
            League::create([
                'name' => $league['name'],
                'name_short' => $league['name_short'],
                'photo' => $league['photo']
            ]);
        }

    }
}
