<?php

namespace Database\Seeders;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $game = Game::factory(100)->create()->each(function ($game){
            $player1_id = Player::all()->random()->id;
            $color = array('black', 'white');
            $player1_color = $color[array_rand($color)];
            $player2_id = Player::all()->random()->id;
            $player2_color = $player1_color == 'black' ? 'white' : 'black';
    
            $player = array($player1_id, $player2_id);
            if($game->win){
                $winner_player_id = $player[array_rand($player)];
            } else {
                $winner_player_id = null;
            }
            $game->winner_player_id = $winner_player_id;
            $game->update();
            $players = array(
                array('player_id' => $player1_id, 'color' => $player1_color),
                array('player_id' => $player2_id, 'color' => $player2_color)
            );
            $game->players()->attach($players);
        });
    }
}
