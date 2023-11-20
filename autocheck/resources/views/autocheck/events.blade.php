@extends('layouts.layout')

@section('content')
    @foreach ($events as $event)
        <div class="events">
            <div><b>Description:</b> {{ $event->description }}<br>
            <b>Location:</b> {{ $event->location }}<br>
            <b>Time:</b> {{ $event->time }}<br>
            <b>Vehicles:</b><br><ul>
                @foreach ($event->vehicles as $vehicle)
                    <li>{{ $vehicle->plate }}</li>
                @endforeach</ul>
            <hr></div>
        </div>
    @endforeach
@endsection
