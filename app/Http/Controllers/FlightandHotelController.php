<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlightandHotel\StoreRequest;
use App\Models\FlightandHotel;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class FlightandHotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = FlightandHotel::all();

        return view('flight-and-hotel.index',['data' => $data]);
    }

    public function create()
    {
        return view('flight-and-hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        try {
            $validated = $request->validated();

            // If a file is uploaded, store it in the public storage
            if ($request->hasFile('image')) {
                $filePath = Storage::disk('public')->put('files/filights_and_hotels', $request->file('image'));
                $validated['image'] = $filePath;
            }

            // Create a new FlightandHotel instance with the validated data
            $create = FlightandHotel::create($validated);
            if ($create) {
                // Flash a success notification and redirect to the index page
                session()->flash('notif.success', 'Data Added successfully!');
                return redirect()->route('flight_and_hotel.index');
            }
        } catch (\Exception $e) {
            // Handle the exception (e.g., log it, show an error message)
            // Here's an example of logging the exception:
            Log::error('Error occurred while storing data: ' . $e->getMessage());
            // Flash an error message and redirect back
            session()->flash('notif.error', 'An error occurred while processing your request.');
        }

        // Redirect back to the form page if an error occurred
        return redirect()->back();

    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

     /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlightandHotel $flightandHotel): View
    {
        return view('flight-and-hotel.edit', compact('flightandHotel'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, FlightandHotel $flightandHotel)
    {
        $validated = $request->validated();

        // If a file is uploaded, store it in the public storage
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('public')->put('files/filights_and_hotels', $request->file('image'));
            $validated['image'] = $filePath;
        }

        // Create a new FlightandHotel instance with the validated data
        $update = $flightandHotel->update($validated);
        if ($update) {
            // Flash a success notification and redirect to the index page
            session()->flash('notif.success', 'Data updated successfully!');
            return redirect()->route('flight_and_hotel.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlightandHotel $flightandHotel)
    {
        $flightandHotel->delete();

        session()->flash('notif.success', 'Data deleted successfully!');
            return redirect()->route('flight_and_hotel.index');
    }
}
