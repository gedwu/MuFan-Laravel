<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'photo'];

    public function country() {
        return $this->belongsTo('App\Country');
    }

//    @todo hasMany App/League?
}
