<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nickname', 'email', 'registered_ip'
    ];

    protected $hidden = [
        'registered_ip',
    ];

    public function battle()
    {
        return $this->belongsToMany(Battle::class, 'battle_player');
    }

    public function score()
    {
        return $this->hasMany(Score::class);
    }
}
