@extends('layouts.layout')

@section('title', 'Vehicles')

@section('content')
    @foreach ($vehicles as $vehicle)
        <div class="vehicles">
            <div class="container">
                <div class="vehicle_details">
                    <b>Plate:</b> {{ $vehicle->plate }}<br>
                    <b>Brand:</b> {{ $vehicle->brand }}<br>
                    <b>Type:</b> {{ $vehicle->type }}<br>
                    <b>Year:</b> {{ $vehicle->year }}<br>
                    {{-- <b>Filename:</b> {{ $vehicle->filename }} --}}
                </div> 
                <div class="car_image">
                    @if ($vehicle->filename === null)
                        <img src="{{ Storage::url('images/' . 'default_car_image.jpg') }}" alt="Vehicle Image"><br>
                    @else
                        <img src="{{ Storage::url('images/' . $vehicle->filename) }}" alt="Vehicle Image"><br>
                    @endif
                </div>
            </div>
        </div>
    @endforeach
@endsection
