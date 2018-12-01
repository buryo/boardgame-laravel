<?php

namespace App\Http\Controllers;

use App\player;
use Illuminate\Http\Request;
use App\Game;
use App\Score;
use App\Battle;
use Illuminate\Support\Facades\DB;

class BattleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::paginate(10);

        return view('back.battles.index', compact('games'));
    }

    /**
     * Show the form for editing the specified game.
     *
     * @param  \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function create(Game $game)
    {
        $players = player::all();
        return view('back.battles.create', compact('game', 'players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Battle::create(request()->validate([
            'game_id' => 'required|numeric|exists:games,id'
        ]));

        $players = $request->input('players');
        $ppoints = $request->input('ppoints');

        /*
         * Loop through every field
         * and foreach field store the data in the database
         */
        for ($i = 1; $i < count($players) + 1; $i++) {
            if ($players['player'.$i] != null){
                DB::table('battle_players')->insert([
                    [
                        'battle_id' => $request->input('game_id'),
                        'player_id' => $players['player'.$i],
                        'player_points' => $ppoints['player' . $i . 'points']
                    ]
                ]);
            }
        }
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
