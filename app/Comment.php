<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $with = ['author'];

    public function author() {
        return $this->belongsTo(User::class, 'user_id');
    }
}
