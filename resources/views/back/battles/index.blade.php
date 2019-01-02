@extends('layouts.master')

@section('content')
    <h3 class="mb-3">Battles</h3>
    <hr class="mb-5">

    <table class="table table-hover table-responsive-sm">
        <tr>
            <th>#</th>
            <th>Game</th>
            <th>Min. - Max. Players</th>
            <th>Description</th>
            <th>Action</th>
        </tr>

        @foreach($games as $game)
            <tr>
                <td>{{ $game['id'] }}</td>
                <td>{{ $game['name'] }}</td>
                <td>{{ $game['minPlayers'] }} — {{ $game['maxPlayers'] }}</td>
                <td>{{ $game['description'] }}</td>
                <td class="input-group">
                    <a href="{{ route('battles.create', ['game' => $game['id']]) }}"><button>Start</button></a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-xs-center justify-content-center">
        {{ $games->render() }}
    </div>
@endsection
