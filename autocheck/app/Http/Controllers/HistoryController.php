<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\History;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('autocheck.search');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (Auth::user() != null) {
            if (Auth::user()->is_admin == true) {
                return view('autocheck.search');
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
            'plate' => 'required|string|regex:/^[a-zA-Z]{3}-?\d{3}/i|unique:vehicles,plate',
        ]);

        $history = History::create($validated);
        return redirect()->route('histories.show');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Assuming $id is the vehicle ID
        $events = Event::whereHas('vehicles', function ($query) use ($id) {
            $query->where('vehicles.id', $id);
        })->get();

        return view('autocheck.search_results', ['events' => $events, 'id' => $id]);
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

    public function home()
    {
    }
}
