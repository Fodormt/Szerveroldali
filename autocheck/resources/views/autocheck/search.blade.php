@extends('layouts.layout')

@section('title', 'Search vehicle event')

@section('content')
    <form method="post" action="{{ Auth::user() ? route('events.show', ['event' => 1]) : route('login') }}">
        @csrf
        {{-- @method('patch') --}}
        <input type="text"  placeholder="License plate" name="plate"
            id="plate" />
            <button type="submit">Search</button>
    </form>
    <br><br>
    <div>
        <button>My search history</button>
    </div>
@endsection
