<?php

namespace App\Http\Controllers;

use App\Models\HomeSlider;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = HomeSlider::all();

        return view('home-slider.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('home-slider.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'sub_title' => 'required|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust max size as needed
        ]);

        // If a file is uploaded, store it in the public storage
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('images/homeSlider-images', 'public');
            $validator['image'] = $filePath;
        }

        // Create a new HomeSlider record with the validated data
        $create = HomeSlider::create($validator);

        if ($create) {
            // Flash a success notification and redirect to the home-slider index page
            session()->flash('notif.success', 'Data Added successfully!');
            return redirect()->route('home-slider.index');
        }

        // If the creation failed, you may want to add an error flash message or handle it accordingly
        session()->flash('notif.error', 'Adding data failed!');
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(HomeSlider $homeSlider)
    {
        return view('home-slider.edit',compact('homeSlider'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, HomeSlider $homeSlider)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(HomeSlider $homeSlider)
    {
        //
    }
}
