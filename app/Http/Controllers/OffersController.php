<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\Offers\StoreRequest;
use App\Models\Offers;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class OffersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Offers::all();
       return view('offers.index',['data' => $data]);
    }

    public function create()
    {
        return view('offers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // If a file is uploaded, store it in the public storage
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('public')->put('files/offers', request()->file('image'));
            $validated['image'] = $filePath;
        }

        // Create a new task with the validated data
        $create = Offers::create($validated);

        if($create) {
            // Flash a success notification and redirect to the task index page
            session()->flash('notif.success', 'Task created successfully!');
            return redirect()->route('offers.index');
        }
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
    public function edit(Offers $offers): View
    {
        return view('offers.edit', compact('offers'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, Offers $offers)
    {
        $validated = $request->validated();

        // If a file is uploaded, store it in the public storage
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('public')->put('files/offers', request()->file('image'));
            $validated['image'] = $filePath;
        }

        // Create a new task with the validated data
        $create =$offers->update($validated);

        if($create) {
            // Flash a success notification and redirect to the task index page
            session()->flash('notif.success', 'data updated successfully!');
            return redirect()->route('offers.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Offers $offers)
    {
        $offers->delete();

        session()->flash('notif.success', 'data deleted successfully!');
            return redirect()->route('offers.index');

    }
}
