@extends('layouts.layout')

@section('content')
    @foreach ($vehicles as $vehicle)
        <div class="vehicles">
            <div>
            <b>Plate:</b> {{ $vehicle->plate }}<br>
            <b>Brand:</b> {{ $vehicle->brand }}<br>
            <b>Type:</b> {{ $vehicle->type }}<br>
            <b>Year:</b> {{ $vehicle->time }}<br>
            <b>Filename:</b> {{ $vehicle->filename }}<br>
            <hr></div>
        </div>
    @endforeach
@endsection
