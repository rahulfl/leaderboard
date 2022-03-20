<?php

namespace App\Http\Controllers;

use App\Models\Player;
use App\Http\Requests\StorePlayerRequest;
use App\Http\Requests\UpdatePlayerRequest;
use App\Models\Game;
use App\Models\Level;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = Player::all();
        
        return view('player.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $levels = Level::all();
        return view('player.create', compact('levels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlayerRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayerRequest $request)
    {
        $player = $request->validated();
        Player::create($player);

        return redirect()->route('player.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(Player $player)
    {
        $game_count = $player->games->count();
        $win_count = $player->games->where('winner_player_id', $player->id)->count();
        $game_not_draw_count = $player->games->where('win', 1)->count();

        $white_win_count = $player->games()->where('winner_player_id', $player->id)->wherePivot('color', 'black')->count();
        $black_win_count = $player->games()->where('winner_player_id', $player->id)->wherePivot('color', 'white')->count();

        return view('player.show', compact('player', 'game_count', 'win_count', 'game_not_draw_count', 'white_win_count', 'black_win_count'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(Player $player)
    {
        $levels = Level::all();
        return view('player.edit', compact('player','levels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlayerRequest  $request
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayerRequest $request, Player $player)
    {
        $data = $request->validated();
        $player->update($data);

        return redirect()->route('player.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(Player $player)
    {
        $player->delete();

        return redirect()->route('player.index');
    }
}
