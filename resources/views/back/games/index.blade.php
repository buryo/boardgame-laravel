@extends('layouts.master')

@section('content')
    <h3 class="mb-3">Games</h3>
    <hr class="mb-5">

    <table class="table table-hover table-responsive-sm">
        <tr>
            <th>Game Titel</th>
            <th>min players</th>
            <th>max players</th>
            <th>description</th>
            <th></th>
        </tr>

        @foreach($games as $game)
            <tr>
                <th>{{ $game['name'] }}</th>
                <td>{{ $game['minPlayers'] }}</td>
                <td>{{ $game['maxPlayers'] }}</td>
                <td>{{ $game['description'] }}</td>
                <td></td>
            </tr>
        @endforeach
    </table>
    <div class="text-xs-center justify-content-center">
        {{ $games->render() }}
    </div>
    </table>
@endsection
