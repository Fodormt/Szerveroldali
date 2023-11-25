<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (Auth::user() != null) {
            if (Auth::user()->is_admin == true) {
                return view('autocheck.vehicles', ['vehicles' => Vehicle::all()]);
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
                return view('autocheck.vehicles_create');
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

        $validated0 = $request->validate([
            'plate' => 'required|string|regex:/^[a-zA-Z]{3}-?\d{3}$/i',
            'brand' => 'required|string',
            'type' => 'required|string',
            'year' => 'required|date_format:Y|before:today',
            'file' => 'sometimes|nullable|file',
        ]);

        $converted_plate = Str::upper($validated0['plate']);

        if (!Str::contains($converted_plate, '-')) {
            $converted_plate = substr_replace($converted_plate, '-', 3, 0);
        }

        // Modify the plate value
        $validated0['plate'] = $converted_plate;

        // Perform additional validation
        $validated = Validator::make($validated0, [
            'plate' => 'unique:vehicles,plate',
        ]);

        // Check if validation fails
        if ($validated->fails()) {
            // Handle validation failure
            return redirect()->back()->withErrors($validated)->withInput();
        }

        $validated['filename'] = $request->validated('file')->getClientOriginalName();
        $path = $request->file('file')->store();
        $validated['filename_hash'] = $path;

        $vehicle = Vehicle::create($validated);
        return redirect()->route('vehicles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $vehicle = Vehicle::find($id);
        // return view('autocheck.vehicles');
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
