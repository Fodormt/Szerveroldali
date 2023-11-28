@extends('layouts.layout')

@section('title', 'Add event')

@section('content')
    <form method="post" action="{{ route('events.store') }}">
        @csrf
        {{-- @method('patch') --}}
        <input type="text" placeholder="Location" name="location" id="location"
            value="{{ old('location', $event->location ?? '') }}" />
        @error('location')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <input type="date" placeholder="Date" name="time" id="time"
            value="{{ old('time', $event->time ?? '') }}" />
        @error('time')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <input type="text" placeholder="Description" name="description" id="description"
            value="{{ old('description', $event->description ?? '') }}" />
        @error('description')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        @foreach ($vehicles as $v)
            <div>
                <input type="checkbox" value="{{ $v->id }}" name="vehicles[]" id="vehicles" />
                {{ $v->plate }}
            </div>
        @endforeach
        @error('vehicles')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <button type="submit">Add event</button>
    </form>

@endsection
