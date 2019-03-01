@extends('layouts.app')

@section('content')
    <section>
        <h1>Games</h1>
        <table class="table table-striped">
            <tbody>
            @foreach($games as $game)
                <tr>
                    <td class="text-left">{{$game['date']}}</td>
                    <td class="text-right">{{$game['home_team']}}</td>
                    <td class="text-right">
                        <img src="{{$game['home_logo']}}" class="logo-mini">
                    </td>

                    <td role="button" class="text-center">
                        <button class="{{$game['button_class']}}">
                            {{$game['button']}}
                        </button>
                    </td>

                    <td>
                        <img src="{{ $game['away_logo']}}" class="logo-mini">
                    </td>

                    <td class="text-left">{{$game['away_team']}}</td>
                    <td>
                        <img src="{{$game['league_photo']}}" class="logo-mini">
                    </td>
                    <td class="text-right">{{$game['league_name']}}</td>
                </tr>
            @endforeach
            </tbody>

        </table>
    </section>


@endsection