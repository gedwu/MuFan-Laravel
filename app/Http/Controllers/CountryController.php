<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function create_countries(){
        $countries =[
            [
                'name' => 'Anglija',
                'name_short' => 'eng',
                'nationality' => 'anglas',
                'photo' => 'country.jpg'
            ],
            [
                'name' => 'Prancūzija',
                'name_short' => 'fra',
                'nationality' => 'prancūzas',
                'photo' => 'fra.png'
            ],
            [
                'name' => 'Ispanija',
                'name_short' => 'esp',
                'nationality' => 'Ispanas',
                'photo' => 'country.jpg'
            ]
        ];

        foreach ($countries as $country) {
            Country::create([
                'name' => $country['name'],
                'name_short' => $country['name_short'],
                'nationality' => $country['nationality'],
                'photo' => $country['photo']
            ]);
        }
    }
}
