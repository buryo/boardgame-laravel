<?php

namespace App\Http\Controllers;

use App\player;
use Illuminate\Http\Request;

class PlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $players = player::paginate(15);
        return view('back.players.index', compact('players'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(),[
                'nickname' => 'required|min:3|unique:players',
                'email' => 'required|email|unique:players',
        ]);

        player::create([
            'registered_ip' => \Request::ip(),
            'nickname' => $request['nickname'],
            'email' => $request['email'],
            ]);

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\player  $player
     * @return \Illuminate\Http\Response
     */
    public function show(player $player)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\player  $player
     * @return \Illuminate\Http\Response
     */
    public function edit(player $player)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\player  $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, player $player)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\player  $player
     * @return \Illuminate\Http\Response
     */
    public function destroy(player $player)
    {
        //
    }
}
