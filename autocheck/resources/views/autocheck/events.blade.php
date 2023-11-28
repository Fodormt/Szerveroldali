@extends('layouts.layout')

@section('title', 'Events')

@section('content')
    @foreach ($events as $event)
        <div class="events">
            <div><b>Description:</b> {{ $event->description }}<br>
                <b>Location:</b> {{ $event->location }}<br>
                <b>Time:</b> {{ $event->time }}<br>
                <b>Vehicles:</b><br>
                <ul>
                    @foreach ($event->vehicles as $vehicle)
                        <li>{{ $vehicle->plate }}</li>
                    @endforeach
                </ul>
            </div>
            <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="post">
                @csrf
                @method('delete')
                <button title="Delete event"> Delete event</button>
            </form>
        </div>
    @endforeach
@endsection
