<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    /**
     * The games that belong to the player.
     */
    public function games()
    {
        return $this->belongsToMany(Game::class)->withPivot('color');
    }

    /**
     * Get the rank associated with the player.
     */
    public function rank()
    {
        return $this->hasOne(Rank::class);
    }

    /**
     * Get the rank associated with the player.
     */
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

}
