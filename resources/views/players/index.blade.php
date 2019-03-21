@extends('layouts.app')

@section('content')
<div class="row">
    @forelse($players as $player)
        <div class="col-md-3">
            <div class="card">
                <img class="card-img-top" src="storage/players500x333/{{$player->photo}}" alt="Card image cap">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <span class="badge badge-secondary" style="padding: 6px;">
                                #{{$player->number}}
                             </span>
                        </div>
                        <div class="col-md-9">
                            {{$player->first_name.' '.$player->last_name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <img src="storage/flags/{{$player->country->photo}}" style="display: inline-block; width: 27px; height: 21px;">
                        </div>
                        <div class="col-md-9">
                            {{$player->country->name}}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            {{$player->birth_date}}
                        </div>
                        <div class="col-md-9">
                            metai
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @empty
        <p>Žaidėjų duomenų bazėje nerasta</p>
    @endforelse
</div>

@endsection