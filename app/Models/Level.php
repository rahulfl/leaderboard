<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $guarded = ['id'];  
    
    /**
     * Get the players for this Level.
     */
    public function players()
    {
        return $this->hasMany(Players::class);
    }
}
