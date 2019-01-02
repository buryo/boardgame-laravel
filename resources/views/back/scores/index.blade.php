@extends('layouts.master')

@section('content')
    <h3 class="mb-3">Scores</h3>
    <hr class="mb-5">

    <table class="table table-hover table-responsive-sm">
        <tr>
            <th>#</th>
            <th>Game</th>
            <th>Played by</th>
            <th>Date</th>
        </tr>

        @foreach($battles as $battle)
            <tr>
                <td>{{ $battle['id'] }}</td>
                <td>{{ $battle->game['name'] }}</td>
                <td>{{ count($battle->score) }} players</td>
                <td>{{ \Carbon\Carbon::parse($battle['created_at'])->diffForHumans(now())}}</td>
                <td class="input-group">
                    {{--<a href="{{ route('battles.create', ['game' => $game['id']]) }}"><button>Start</button></a>--}}
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-xs-center justify-content-center">
        {{--{{ $scores->render() }}--}}
    </div>
@endsection
