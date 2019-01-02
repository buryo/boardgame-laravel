@extends('layouts.master')

@section('content')
    <h3 class="mb-3">Battle Statics</h3>
    <hr class="mb-5">

    <div class="row mt-4">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form method='post' action='{{route('battles.store')}}'>
                        @csrf
                        <div class="form-group">
                            <label for="gameName">Game</label>
                            <input type="hidden" name="game_id" value="{{$game['id']}}">
                            <input type='text' class="form-control" id="game" name="type"
                                   value='{{$game['name']}}' disabled>
                        </div>

                        <!-- Players -->
                        <div class="row form-group">
                            @for ($i = 1; $i < $game['maxPlayers'] + 1; $i++)
                                <div class="col">
                                    <label for="speler{{$i}}">{{$i}}. Winner</label>
                                    <select class="form-control" name="players[player{{$i}}]">
                                        <option value=""></option>
                                        @foreach($players as $player)
                                            <option value="{{$player['id']}}">{{$player['nickname']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            @endfor
                        </div>
                        <!-- end players-->
                        
                        <!--        Scores      -->
                        <div class="row form-group">
                            @for ($i = 1; $i < $game['maxPlayers'] + 1; $i++)
                                <div class="col">
                                    <label for="punten">Points</label>
                                    <input type="text" class="form-control" name="ppoints[player{{$i}}points]">
                                </div>
                            @endfor
                        <!-- end scores-->
                        </div>

                        <div class="form-group row">
                            <div class="col ">
                                <button type="submit" class="btn btn-success float-right">Save Battle!</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
