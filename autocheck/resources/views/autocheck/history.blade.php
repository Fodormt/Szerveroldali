@extends('layouts.layout')

@section('title', 'Search history')

@section('content')
    @foreach ($histories as $history)
        <div class="histories">
            <div class="container">
                <div class="history_details">
                    <b>License plate:</b> {{ $history->plate }}<br>
                    <b>time:</b> {{ $history->created_at }}<br>
                    <a href="{{ route('histories.store', ['plate' => $history->plate]) }}">Search again</a><br>
                </div>
                <div class="car_image">
                    @php $foundVehicle = false; @endphp
                    @foreach ($vehicles as $vehicle)
                        @if ($vehicle->plate && $vehicle->plate == $history->plate && $vehicle->filename)
                            <img src="{{ Storage::url('images/' . $vehicle->filename) }}" alt="Vehicle Image"><br>
                            @php $foundVehicle = true; @endphp
                        @break
                    @endif
                @endforeach
                @unless ($foundVehicle)
                    <img src="{{ Storage::url('images/default_car_image.jpg') }}" alt="Default Vehicle Image"><br>
                @endunless
                </div>
            </div>
        </div>
    @endforeach
<br>
<div>{{ $histories->onEachSide(10)->links() }}</div>
<br><br>
<div><a href="{{ route('histories.index') }}">
        < Back to search</a>
</div>
@endsection
