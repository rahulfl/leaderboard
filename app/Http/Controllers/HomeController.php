<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $leader_ranks = DB::table('game_player')
            ->join('games','games.id', '=', 'game_player.game_id')
            ->join('players','game_player.player_id', '=', 'players.id')
            ->groupBy('game_player.player_id')
            ->select('players.*', 
                DB::raw('(
                    SELECT count(*)
                    FROM game_player as gpw
                    WHERE gpw.player_id = game_player.player_id
                    AND gpw.color = "white"	
                    GROUP BY gpw.player_id
                ) as white_cnt'),
                DB::raw('(
                    SELECT count(*)
                    FROM game_player as gpb
                    WHERE gpb.player_id = game_player.player_id
                    AND gpb.color = "black"	
                    GROUP BY gpb.player_id
                    ) as black_cnt'),
                DB::raw('(
                    SELECT count(*) 
                    FROM games 
                    WHERE games.winner_player_id = game_player.player_id
                    ) as win_count'))
            ->having('white_cnt', '>=','10')
            ->having('black_cnt', '>=','10')
            ->orderBy('win_count', 'desc')
            ->get();

        $lowest_move_game = Game::where('win', 1)->orderBy('moves', 'asc')->first();
        if($lowest_move_game->winner_player_id == $lowest_move_game->players[0]->id){
            $lowest_move_win = $lowest_move_game->players[0];
            $lowest_move_loss = $lowest_move_game->players[1];
         } else {
            $lowest_move_win = $lowest_move_game->players[1];
            $lowest_move_loss = $lowest_move_game->players[0];
         }

        $heighest_move_game = Game::where('win', 1)->orderBy('moves', 'desc')->first();
        if($heighest_move_game->winner_player_id == $heighest_move_game->players[0]->id){
            $heighest_move_win = $heighest_move_game->players[0];
            $heighest_move_loss = $heighest_move_game->players[1];
         } else {
            $heighest_move_win = $heighest_move_game->players[1];
            $heighest_move_loss = $heighest_move_game->players[0];
         }

        return view('home', compact('leader_ranks','lowest_move_game', 'heighest_move_game','lowest_move_win','lowest_move_loss', 'heighest_move_win', 'heighest_move_loss'));
    }
}
