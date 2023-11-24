@extends('layouts.layout')

@section('content')
        <div class="results">
            @foreach ($events as $event)
                <div><b>Description:</b> {{ $event->description }}<br>
                    <b>Location:</b> {{ $event->location }}<br>
                    <b>Time:</b> {{ $event->time }}<br>
                    <b>Vehicles:</b><br><ul>
                        @foreach ($event->vehicles as $vehicle)
                            <li>{{ $vehicle->plate }}</li>
                        @endforeach</ul>
                    <hr></div>
                @endif
            @endforeach
            <hr></div>
        </div>
@endsection
