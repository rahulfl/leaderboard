<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    protected $casts = [
        'date' => 'date:Y-m-d',
    ];

    protected function date(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => date('D F Y'),
            set: fn ($value) => date('Y-m-d'),
        );
    }

    /**
     * The players that belong to the game.
     */
    public function players()
    {
        return $this->belongsToMany(Player::class)->withPivot('color');
    }

    /**
     * The players that belong to the game.
     */
    public function winnerInfo($player_id)
    {
        return $this->belongsToMany(Player::class)->wherePivot('player_id', $player_id)->withPivot('color')->first();
    }
}
