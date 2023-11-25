@extends('layouts.layout')

@section('title', 'Search vehicle event')

@section('content')
    @if (session('error'))
        <div class="error">
            {{ session('error') }}
        </div>
    @endif
    <form method="post" action="{{ Auth::user() ? route('histories.store') : route('login') }}">
        @csrf
        {{-- @method('patch') --}}
        <input type="text" placeholder="License plate" name="plate" id="plate" id="plate" />
        @error('plate')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        <button type="submit">Search</button>
    </form>
    <br><br>
    <div>
        {{-- <a href="{{ route(histories.index) }}"></a> --}}
    </div>
@endsection
