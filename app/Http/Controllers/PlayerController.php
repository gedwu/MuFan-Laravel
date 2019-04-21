<?php

namespace App\Http\Controllers;

use App\Player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        dd(\App\Country::where('name_short', 'fra')->first()->id);
//        dd(\App\Position::where('short', 'M')->first()->id);
        $players = Player::all();

        foreach ($players as $key => $player) {
            $players[$key]->birth_date = \Carbon\Carbon::parse($player->birth_date)->age;
        }

        return view('players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        //
    }

    public function add_players_data() {
        $france_id = \App\Country::where('name_short', 'fra')->first()->id;

        $mf_id = \App\Position::where('short', 'M')->first()->id;
        $at_id = \App\Position::where('short', 'A')->first()->id;

        $players = [
            [
                'country_id' => $france_id,
                'position_id' => $mf_id,
                'number' => 6,
                'first_name' => 'Paul',
                'last_name' => 'Pogba',
                'photo' => 'Pogba.jpg',
                'birth_date' => '1993-03-15',
            ],
            [
                'country_id' => $france_id,
                'position_id' => $at_id,
                'number' => 9,
                'first_name' => 'Anthony',
                'last_name' => 'Martial',
                'photo' => 'Martial.jpg',
                'birth_date' => '1995-12-05',
            ],
        ];

        foreach ($players as $player) {
            Player::create([
                'country_id' => $player['country_id'],
                'position_id' => $player['position_id'],
                'number' => $player['number'],
                'first_name' => $player['first_name'],
                'last_name' => $player['last_name'],
                'photo' => $player['photo'],
                'birth_date' => $player['birth_date'],
            ]);
        }
    }
}
