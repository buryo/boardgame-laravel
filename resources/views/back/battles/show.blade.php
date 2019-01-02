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
                            <input type="hidden" name="game_id" value="{{$battle->game['id']}}">
                            <input type='text' class="form-control" id="game" name="type"
                                   value='{{$battle->game['name']}}' disabled>
                        </div>

                        <!-- Players -->
                        <div class="row form-group">
                            <?php $i=1 ?>
                            @foreach( $battle->score as $scorePlayer)
                                <div class="col">
                                    <label for="speler">{{$i}}. Winner</label>
                                    <select class="form-control" disabled name="">
                                        <option value=""></option>
                                        @foreach($players as $player)
                                            @if($player['id'] == $scorePlayer['player_id'])
                                                <option selected>{{$player['nickname']}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <?php  $i++ ?>
                            @endforeach
                        </div>
                        <!-- end players-->

                        <!--        Scores      -->
                        <div class="row form-group">
                            @foreach( $battle->score as $player)
                                <div class="col">
                                    <label for="punten">Points</label>
                                    <input disabled type="text" class="form-control" value="{{$player['score']}}">
                                </div>
                            @endforeach
                        <!-- end scores-->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
