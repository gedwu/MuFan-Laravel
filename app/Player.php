<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $fillable = ['first_name', 'last_name', 'height', 'birth_place', 'photo'];

    public function country() {
        return $this->belongsTo('App\Country');
    }

    public function position() {
        return $this->belongsTo('App\Position');
    }

//    @todo: One player can join club more than once
    public function transfer() {
        return $this->belongsTo('App\Transfer');
    }
}
