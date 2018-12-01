<?php

namespace App\Http\Controllers;

use App\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin', ['only' => ['create', 'store', 'edit', 'delete']]);
    }

    /**
     * Display a listing of the game.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $games = Game::paginate(10);
        return view('back.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new game.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('back.games.create');
    }

    /**
     * Store a newly created game in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Game::create(request()->validate([
            'name' => 'required|min:3|unique:games',
            'description' => 'nullable',
            'minPlayers' => 'required|lte:maxPlayers|numeric',
            'maxPlayers' => 'required|gte:minPlayers|numeric'
        ]));

        Session::flash('message', 'Game created successfully!');
        Session::flash('alert-class', 'alert-success');

        return back();
    }

    /**
     * Show the form for editing the specified game.
     *
     * @param  \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function edit(Game $game)
    {
        $game = Game::find($game['id']);

        return view('back.games.edit', compact('game'));
    }

    /**
     * Update the specified game in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Game $game)
    {
        Game::where('id', $game['id'])->update([
            'name' => $request['name'],
            'minPlayers' => $request['minPlayers'],
            'maxPlayers' => $request['maxPlayers'],
            'description' => $request['description']
        ]);

        Session::flash('message', 'Game updated successfully!');
        Session::flash('alert-class', 'alert-success');

        return back();
    }

    /**
     * Remove the specified game from storage.
     *
     * @param  \App\Game $game
     * @return \Illuminate\Http\Response
     */
    public function destroy(Game $game)
    {
        $game->delete();
        return back();
    }
}
