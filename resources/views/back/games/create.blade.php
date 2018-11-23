@extends('layouts.master')

@section('content')
    <h3 class="mb-3">Game Creating</h3>
    <hr class="mb-5">
    @if(Session::has('message'))
        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
    @endif

    <form method='post' action='/games'>
        @csrf()
        <div class="row">
            <div class="col-6">
                <div class="form-group input-group input-group-lg">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Game name</div>
                    </div>
                    <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                </div>

                <div class="form-group input-group input-group-lg">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Min players</div>
                    </div>
                    <input type="number" class="form-control" name="minPlayers" value="{{ old('minPlayers') }}">
                </div>

                <div class="form-group input-group input-group-lg">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Max players</div>
                    </div>
                    <input type="number" class="form-control" name="maxPlayers" value="{{ old('maxPlayers') }}">
                </div>
            </div>
            <div class="col-6">
                <div class="form-group">
                    <label for="gameName">Game description</label>
                    <textarea name="description" class="form-control" placeholder="Your Message *" value="{{ old('description') }}"
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
