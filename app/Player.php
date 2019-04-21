<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $guarded =[];

    public $timestamps = false;

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
