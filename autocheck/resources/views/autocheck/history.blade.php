@extends('layouts.layout')

@section('title', 'Search history')

@section('content')
    @foreach ($histories as $history)
        <div class="histories">
            <p>
                <b>License plate:</b> {{ $history->plate }}
                <b>User:</b> {{ $history->user->name }}
            </p>
    @endforeach
@endsection
