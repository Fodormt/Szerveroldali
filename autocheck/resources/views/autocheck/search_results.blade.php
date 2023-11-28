@extends('layouts.layout')

@section('title', 'Search results')


@section('content')
    <div>
        <a href="{{ route('histories.index') }}">
            < Back to search</a>
    </div>
    <div class="vehicle_info">
        <h3>Vehicle info</h3>
        <b>Plate:</b> {{ $vehicle->plate }}<br>
        <b>Brand:</b> {{ $vehicle->brand }}<br>
        <b>Type:</b> {{ $vehicle->type }}<br>
        <b>Year:</b> {{ $vehicle->year }}<br>
    </div>
    <div class="car_image">
        @if ($vehicle->filename === null)
            <img src="{{ Storage::url('images/' . 'default_car_image.jpg') }}" alt="Vehicle Image"><br>
        @else
        <img src="{{ asset('storage/images/' . $vehicle->filename)  }}" alt="Vehicle Image"><br>        @endif
    </div>
    <br><br><br>


    <div class="results"> <br><br><br> <br><br>
        <h3>Events</h3>
        @foreach ($events as $event)
        <div>
            <b>Description:</b> {{ $event->description }}<br>
            <b>Time:</b> {{ $event->time }}<br>
            <a href="{{ route('events.event_details', ['id' => $event->id]) }}"><b>See details [premium]</b></a>
            <hr>
        </div>
    @endforeach
    
    </div>
    </div>
@endsection
