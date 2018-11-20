@extends('layouts.master')

@section('content')
    <h3 class="mb-3">Game Creating</h3>
    <hr class="mb-5">

    <form method='post' action='/battles/create'>
        @csrf()
        <div class="row">
            <div class="col-6">
                <div class="form-group input-group input-group-lg">
                    <div class="input-group-prepend">
                        <div class="input-group-text ">Game name</div>
                    </div>
                    <input type="text" class="form-control" name="game_name" value="{{ old('game_name') }}">
                </div>

                <div class="form-group input-group input-group-lg">
                    <div class="input-group-prepend">
                        <div class="input-group-text ">Min players</div>
                    </div>
                    <input type="text" class="form-control" name="min_players" value="{{ old('min_players') }}">
                </div>

                <div class="form-group input-group input-group-lg">
                    <div class="input-group-prepend">
                        <div class="input-group-text ">Max players</div>
                    </div>
                    <input type="text" class="form-control" name="max_player" value="{{ old('max_player') }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="gameName">Game description</label>
                    <textarea name="txtMsg" class="form-control" placeholder="Your Message *"
                              style="width: 100%; height: 127px;"></textarea>
                </div>
            </div>
            @include('layouts.error')
            <div class="form-group col-12 text-center">
                <button type="submit" class="btn p-2 btn-primary">Create Game!</button>
            </div>
        </div>
    </form>
@endsection
