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
        
        <input type="text" placeholder="Vehicle1" name="vehicle1" id="vehicle1" />
        @error('vehicle1')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        
        <input type="text" placeholder="Vehicle2" name="vehicle2" id="vehicle2" />
        @error('vehicle2')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        
        <button type="submit">Add event</button>
    </form>
    
@endsection
