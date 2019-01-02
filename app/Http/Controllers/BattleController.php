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
        $battle = Battle::create(
            request()->validate([
            'game_id' => 'required|numeric|exists:games,id',
        ]));

        $players = $request->input('players');
        $ppoints = $request->input('ppoints');

        /*
         * Loop through every field
         * and foreach field store the data in the database
         */
        for ($i = 1; $i < count($players) + 1; $i++) {
            if ($players['player'.$i] != null){
                DB::table('battle_player')->insert([
                    [
                        'battle_id' => $battle->id,
                        'player_id' => $players['player'.$i],
                    ]
                ]);

                switch ($i) {
                    case "1":
                        $tournamentPoints = 7;
                        break;
                    case "2":
                        $tournamentPoints = 5;
                        break;
                    case "3":
                        $tournamentPoints = 3;
                        break;
                    case "4":
                        $tournamentPoints = 1;
                        break;
                    default:
                        $tournamentPoints = 0;
                }

//              Changing players tournament points
                DB::table('players')
                    ->where('id',  $players['player'.$i])
                    ->increment('points', $tournamentPoints);

//              Insert the scores of players
                DB::table('scores')->insert([
                    [
                        'battle_id' => $battle->id,
                        'player_id' => $players['player'.$i],
                        'score' => $ppoints['player'.$i.'points'],
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
        $battle = Battle::with('game')->with('score')->orderBy('id', 'DESC')->find($id);
        $players = Player::all();
//        dd($battle);
        return view('back.battles.show', compact('battle', 'players'));
    }
}
