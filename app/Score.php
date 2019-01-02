<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    public function battle()
    {
        return $this->belongsTo(Battle::class);
    }

    public function player()
    {
        return $this->belongsTo(Player::class);
    }
}
