@extends('layouts.layout')

@section('title', 'Add vehicle')

@section('content')
    <form method="post" action="{{ route('vehicles.store') }}" enctype="multipart/form-data">
        @csrf
        {{-- @method('patch') --}}
        <input type="text" placeholder="License plate" name="plate" id="plate" value="{{ old('plate', $vehicle->plate ?? '') }}"/>
        @error('plate')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        <input type="text" placeholder="Brand" name="brand" id="brand" value="{{ old('brand', $vehicle->brand ?? '') }}"/>
        @error('brand')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        <input type="text" placeholder="Type" name="type" id="type" value="{{ old('type', $vehicle->type ?? '') }}"/>
        @error('type')
            <div class="error">
                {{ $message }}
            </div>
        @enderror

        <input type="number" min="1900" placeholder="Year" name="year" value="{{ old('year', $vehicle->year ?? '') }}"
            id="year" />
        @error('year')
            <div class="error">
                {{ $message }}
            </div>
        @enderror
        
        <input type="file" id="file" name="file" >
        @error('file')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror

        <button type="submit">Add vehicle</button>
    </form>

@endsection
