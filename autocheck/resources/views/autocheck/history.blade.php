@extends('layouts.layout')

@section('title', 'Search history')

@section('content')
    @foreach ($histories as $history)
        <div class="histories">
            <div>
                <img src="" alt="">
                <b>License plate:</b> {{ $history->plate }}
                <b>time:</b> {{ $history->created_at }}
                <a href="{{ route('histories.store', ['plate' => $history->plate]) }}">Search again</a>
            </div>
    @endforeach
    </div>
    {{ $histories->onEachSide(10)->links() }}
@endsection
