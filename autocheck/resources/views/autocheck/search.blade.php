@extends('layouts.layout')

@section('title', 'Search vehicle event')

@section('content')
    @if (session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif
    <form method="post" action="{{ route('histories.store') }}">
        @csrf
        {{-- @method('patch') --}}
        <input type="text" placeholder="License plate" name="plate" id="plate" id="plate" value="{{ request('plate') ? request('plate') : '' }}"/>
        @error('plate')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        <button type="submit">Search</button>
    </form>
    <br><br>
    <div>
        <a href="{{ route('histories.my_history') }}">View search history</a>
    </div>
@endsection
