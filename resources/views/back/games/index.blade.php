@extends('layouts.master')

@section('content')
    <h3 class="mb-3">Games</h3>
    <hr class="mb-5">

    <table class="table table-hover table-responsive-sm">
        <tr>
            <th>Game title</th>
            <th>Min players</th>
            <th>Max players</th>
            <th>Description</th>
            <th>Action</th>
        </tr>

        @foreach($games as $game)
            <tr>
                <td>{{ $game['name'] }}</td>
                <td>{{ $game['minPlayers'] }}</td>
                <td>{{ $game['maxPlayers'] }}</td>
                <td>{{ $game['description'] }}</td>
                <td class="input-group">
                    <form id="form-edit-{{$game['id']}}" action="{{ route('games.edit', ['game' => $game['id']]) }}">
                        <input type="hidden" value="fsdsd">
                        <i onclick="document.getElementById('form-edit-{{$game['id']}}').submit();" class='fas fa-edit pointer'></i>
                    </form>
                    <span class="input-group-btn" style="width:8px;"></span>
                    <form id="form-delete-{{$game['id']}}" method="post" action="{{ route('games.destroy', ['game' => $game['id']]) }}">
                        @csrf
                        {{ method_field('DELETE') }}
                        <input name="_method" type="hidden" value="DELETE">
                        <i onclick="document.getElementById('form-delete-{{$game['id']}}').submit();" class='fas fa-trash-alt pointer'></i>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="text-xs-center justify-content-center">
        {{ $games->render() }}
    </div>
@endsection
