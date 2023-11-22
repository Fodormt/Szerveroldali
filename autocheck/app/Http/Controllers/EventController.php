<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autocheck.events_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:100',
            'time' => 'required|date_format:YYYY:MM:DD|min:0|max:3',
            'description' => 'required|string|max:1000',
            // 'vehicle1' => 'required|string|',
            // 'vehicle2' => 'required|string|',
            // regex:[a-zA-Z]{3}-?\d{3}
        ]);

        $event = Event::create($validated);

        $event->vehicles()->attach($validated['vehichle1']);
        $event->vehicles()->attach($validated['vehichle2']);

        // $event->comments()->create([
        //     'text' => $validated['text'],
        //     'user_id' => Auth::id(),
        // ]);
        return redirect()->route('events.show', ['id' => $event->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        return view('autocheck.event', ['event' => $event]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
