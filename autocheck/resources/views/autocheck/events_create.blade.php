@extends('layouts.layout')

@section('title', 'Add event')

@section('content')
    <form method="post" action="{{ route('events.store') }}">
        @csrf
        {{-- @method('patch') --}}
        <input type="text" placeholder="Location" name="location" id="location" />
        @error('location')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <input type="date" placeholder="Date" name="time" id="time" />
        @error('date')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <input type="text" placeholder="Description" name="description" id="description" />
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
            @error('vehicle')
                <div class="error">
                    {{ $message }}
                </div>
            @enderror
        @endforeach

        <button type="submit">Add event</button>
    </form>

@endsection
