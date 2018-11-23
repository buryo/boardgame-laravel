@extends('layouts.master')

@section('content')
    <div class="col-12">
        <h3 class="mb-3">{{ __('text.addPlayerText') }}</h3>
        <hr class="mb-5">

        <form method="post" action="/players" class="form-inline justify-content-center mb-5 input-group-lg ">
            @csrf()
            <input type="text" class="form-control mb-2 mr-sm-4 {{ $errors->has('nickname') ? 'is-invalid' : '' }}"
                   name="nickname" placeholder="{{__('Nickname')}}">
            <div class="input-group input-group-lg mb-2 mr-sm-4">
                <div class="input-group-prepend">
                    <div class="input-group-text ">@</div>
                </div>
                <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" name="email"
                       placeholder="{{__('Email')}}">
            </div>
            <button type="submit" class="btn btn-primary mb-2">{{__('form.Submit')}}</button>
            @include('layouts.error')
        </form>

        <table class="table table-hover table-responsive-sm">
            <tr>
                <th>#</th>
                <th>Nickname</th>
                <th>Email</th>
                <th></th>
            </tr>

        @foreach($players as $player)
            <tr>
                <th>{{ ucfirst($player['id']) }}</th>
                <td>{{ ucfirst($player['nickname']) }}</td>
                <td>{{ $player['email'] }}</td>
                <td></td>
            </tr>
        @endforeach
        </table>
        <div class="text-xs-center justify-content-center">
            {{ $players->render() }}
        </div>
    </div>
@endsection
