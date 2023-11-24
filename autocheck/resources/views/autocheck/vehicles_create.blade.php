@extends('layouts.layout')

@section('title', 'Add vehicle')

@section('content')
    <form method="post" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
        @csrf
        {{-- @method('patch') --}}
        <input type="text" placeholder="License plate" name="plate" id="plate" />
        @error('plate')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        <input type="text" placeholder="Brand" name="brand" id="brand" />
        @error('brand')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        <input type="text" placeholder="Type" name="type" id="type" />
        @error('type')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <input type="number" min="1900" placeholder="Year" name="year"
            id="year" />
        @error('year')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        
        <input type="file" id="file" name="file">
        @error('file')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <button type="submit">Add vehicle</button>
    </form>

@endsection
