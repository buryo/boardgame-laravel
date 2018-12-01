<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'minPlayers', 'maxPlayers', 'description',
    ];

    public function battle()
    {
        return $this->hasMany(Battle::class);
    }
}
