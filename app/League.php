<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['name', 'name_short', 'photo'];

    public function country() {
        return $this->belongsTo('App\Country');
    }
}
