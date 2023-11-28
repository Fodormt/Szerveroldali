<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\History;
use App\Models\Vehicle;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('autocheck.search', ['histories' => History::all()]);
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
        if (Auth::user() != null) {
            $request->merge(['plate' => Str::lower($request->input('plate'))]);
            $validated = $request->validate([
                'plate' => 'required|string|regex:/^[a-zA-Z]{3}-?\d{3}/i|unique:vehicles,plate',
            ]);

            $converted_plate = Str::upper($validated['plate']);
            if (!Str::contains($converted_plate, '-')) {
                $converted_plate = substr_replace($converted_plate, '-', 3, 0);
            }

            // Find the vehicle by plate
            $vehicle = Vehicle::where('plate', $converted_plate)->first();

            if ($vehicle) {
                $vehicle_id = $vehicle->id;
                History::create([
                    'user_id' => Auth::user()->id,
                    'plate' => $vehicle->plate,
                ]);
                return redirect()->route('events.show', ['event' => $vehicle_id]);
            } else {
                // Handle the case where the vehicle is not found
                return redirect()->back()->with('error', 'Vehicle not found');
            }
        } else {
            return redirect()->route('login');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('autocheck.search', ['histories' => History::all()]);
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

    public function my_history()
    {
        if (Auth::user() != null) {
            $histories = History::where('user_id', Auth::user()->id)
                ->orderByDesc('created_at')
                ->paginate(10);

            return view('autocheck.history', ['histories' => $histories, 'vehicles' => Vehicle::all()]);
        } else {
            return response('Unauthorized.', 401);
        }
    }
}
