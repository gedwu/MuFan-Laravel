<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    protected $fillable = ['name', 'photo'];

    public function country() {
        return $this->belongsTo('App\Country');
    }
}
