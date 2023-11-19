@extends('layouts.layout')

@section('content')
    @foreach ($events as $event)
        <div class="events">
            <div><b>Description:</b> {{ $event->description }}
            <b>Location:</b> {{ $event->location }}
            <b>Time:</b> {{ $event->time }}
            {{-- <b>User:</b> {{ $event->users() }} --}}
            <b>Vehicles:</b>
                @foreach ($event->vehicles() as $vehicle)
                    - {{ $vehicle }}
                @endforeach
            </div>
        </div>
    @endforeach
@endsection
