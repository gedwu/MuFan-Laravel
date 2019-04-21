<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $oldGames =
            Game::orderBy('start', 'desc')->where('start', '<', NOW())->take(3)->get()->reverse();
        $newGames =
            Game::orderBy('start', 'asc')->where('start', '>', NOW())->take(3)->get();

        $games = array_merge(
            $this->formatGameList($oldGames),
            $this->formatGameList($newGames)
        );

        return view('games.index', compact('games'));
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
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Game  $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        //
    }

    private function formatGameList($list) {
        $games = [];
        foreach ($list as $key => $game) {
            $games[$key]['date'] = $this->getDateLong($game->start);
            $games[$key]['league_photo'] = 'storage/leagues/'.$game->league->photo;
            $games[$key]['league_name'] = $game->league->name;

            if ($game->home) {
                $games[$key]['button'] = $game->goals_in.' - '.$game->goals_out;

                $games[$key]['home_team'] ='Manchester United';
                $games[$key]['home_logo'] ='storage/clubs/ManchesterUnited.png';
                $games[$key]['away_team'] = $game->team->name;
                $games[$key]['away_logo'] = 'storage/clubs/'.$game->team->photo;
            } else {
                $games[$key]['button'] = $game->goals_out.' - '.$game->goals_in;

                $games[$key]['home_team'] = $game->team->name;
                $games[$key]['home_logo'] = 'storage/clubs/'.$game->team->photo;
                $games[$key]['away_team'] = 'Manchester United';
                $games[$key]['away_logo'] = 'storage/clubs/ManchesterUnited.png';
            }

            if (!isset($game->goals_in) || !isset($game->goals_out)) {
                $games[$key]['button_class'] = 'btn btn-secondary';
                $games[$key]['button'] = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $game->start)->format('H:i');
            } elseif ($game->goals_in == $game->goals_out) {
                $games[$key]['button_class'] = 'btn btn-warning';
            } elseif ($game->goals_in > $game->goals_out) {
                $games[$key]['button_class'] = 'btn btn-success';
            } elseif ($game->goals_in < $game->goals_out) {
                $games[$key]['button_class'] = 'btn btn-danger';
            } else {
                $games[$key]['button_class'] = 'btn btn-dark';
            }
        }
        return $games;
    }

//    @todo: move to helper
    function getDateLong($string) {
        $month = substr($string, 5, 2);
        $day = substr($string, 8, 2);

        switch ($month) {
            case "01":
                $month = 'Sausio';
                break;
            case "02":
                $month = 'Vasario';
                break;
            case "03":
                $month = 'Kovo';
                break;
            case "04":
                $month = 'Balandžio';
                break;
            case "05":
                $month = 'Gegužės';
                break;
            case "06":
                $month = 'Birželio';
                break;
            case "07":
                $month = 'Liepos';
                break;
            case "08":
                $month = 'Rugpjūčio';
                break;
            case "09":
                $month = 'Rugsėjo';
                break;
            case "10":
                $month = 'Spalio';
                break;
            case "11":
                $month = 'Lapkričio';
                break;
            case "12":
                $month = 'Gruodžio';
                break;
        }

        return $month.' '.$day;
    }
}
