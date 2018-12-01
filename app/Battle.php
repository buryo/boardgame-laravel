<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Battle extends Model
{
    protected $fillable = [
        'game_id'
    ];

    public function game()
    {
        return $this->belongsTo(Game::class);
    }
}
