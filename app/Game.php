<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
//    @todo: add seeder
    protected $guarded = [];

    public $timestamps = false;

    public function league() {
        return $this->belongsTo('App\League');
    }

    public function team() {
        return $this->belongsTo('App\Team');
    }
}
