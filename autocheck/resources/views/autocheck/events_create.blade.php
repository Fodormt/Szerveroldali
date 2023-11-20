@extends('layouts.layout')

@section('title', 'Add event')

@section('content')
    <form method="post" action="{{ Auth::user() ? route('dashboard') : route('login') }}">
        @csrf
        {{-- @method('patch') --}}
        <input type="text"  placeholder="License plate" name="plate"
            id="plate" />
    </form>
    <button type="submit">Add event</button>
@endsection
