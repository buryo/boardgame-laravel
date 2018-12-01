@extends('layouts.master')

@section('content')
    <h3 class="mb-3">Players</h3>
    <hr class="mb-5">

    <table class="table table-hover table-responsive-sm">
        <tr>
            <th>Nickname</th>
            <th>Points</th>
            <th>Game status</th>
            <th>Member since</th>
        </tr>

        @foreach($players as $player)
            <tr>
                <th>{{ $player['nickname'] }}</th>
                <th>{{ $player['points'] }}</th>
                <th>{{ $player['game_status'] }}</th>
                <td>{{ \Carbon\Carbon::createFromTimeStamp(strtotime($player['created_at']))->format('d-m-Y') }}</td>
            </tr>
        @endforeach
    </table>
    <div class="text-xs-center justify-content-center">
        {{ $players->render() }}
    </div>
@endsection
