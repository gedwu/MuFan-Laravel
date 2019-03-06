@extends('layouts.app')

@section('content')
    @foreach($players as $player)
        <h3>{{$player->first_name.' '.$player->last_name}}</h3>
    @endforeach
@endsection