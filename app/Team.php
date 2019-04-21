<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['country_id', 'name', 'name_short', 'photo'];

    public function country() {
        return $this->belongsTo('App\Country');
    }

//    @todo hasMany App/League?
}
