<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('autocheck.vehicles', ['vehicles' => Vehicle::all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('autocheck.vehicles_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request -> validate([
            'plate' => 'required|string|regex:/^[a-zA-Z]{3}-?\d{3}/i|unique:vehicles,plate',
            'brand' => 'required|string',
            'type' => 'required|string',
            'year' => 'required|date_format:Y|before:today',
            'file' => 'required|file',
        ]);

        $vehicle = Vehicle::create($validated);
        return redirect() -> route('vehicles.index');
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
