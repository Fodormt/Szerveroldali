@extends('layouts.layout')

@section('title', 'Search vehicle event')

@section('content')
    <form method="post" action="{{ Auth::user() ? route('histories.store') : route('login') }}">
        @csrf
        {{-- @method('patch') --}}
        <input type="text"  placeholder="License plate" name="plate" id="plate"
            id="plate" />
            <button type="submit">Search</button>
    </form>
    <br><br>
    <div>
        {{-- <a href="{{ route(histories.index) }}"></a> --}}
    </div>
@endsection
