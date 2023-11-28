<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user() != null) {
            if (Auth::user()->is_admin == true) {
                return view('autocheck.events', ['events' => Event::all()]);
            } else {
                return response('Unauthorized.', 401);
            }
        }
        return response('Unauthorized.', 401);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user() != null) {
            if (Auth::user()->is_admin == true) {
                return view('autocheck.events_create', ['vehicles' => Vehicle::all()]);
            } else {
                return response('Unauthorized.', 401);
            }
        }
        return response('Unauthorized.', 401);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'location' => 'required|string|max:100',
            'time' => 'required|date_format:Y-m-d|before:today',
            'description' => 'string|max:1000',
            'vehicles' => 'required|array',
            'vehicles.*' => 'integer|distinct|exists:vehicles,id'
        ]);

        $event = Event::create($validated);
        $event->vehicles()->sync($request->vehicles);
        return redirect()->route('events.index');
        // return redirect()->route('events.show', ['id' => $event->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $vehicle = Vehicle::find($id);
        $events = Event::whereHas('vehicles', function ($query) use ($id) {
            $query->where('vehicles.id', $id);
        })->orderByDesc('time')->get();

        return view('autocheck.search_results', ['events' => $events, 'id' => $id, 'vehicle' => $vehicle]);
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
        if (Auth::user() != null) {
            if (Auth::user()->is_admin == true) {
                $event = Event::find($id);
                $event->delete();
                return redirect()->route('events.index');
            } else {
                return response('Unauthorized.', 401);
            }
        }
        return response('Unauthorized.', 401);
    }

    public function event_details(string $id)
    {
        if (Auth::user() != null) {
            if (Auth::user()->is_premium == true) {
                $event = Event::find($id);
                return view('autocheck.event_details', ['event' => $event, 'vehicles' => Vehicle::all()]);
            } else {
                return response('Unauthorized. Premium users only.', 401);
            }
        }
        return response('Unauthorized.', 401);
    }
}
