<?php

namespace App\Http\Controllers;

use App\Models\OurCommitments;
use App\Http\Controllers\Controller;
use App\Models\OurCommitmentBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class OurCommitmentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =OurCommitments::all();

        $banner = new OurCommitmentBanner();

        return view('our-commitments.index',compact('data','banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('our-commitments.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the request data
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'icon_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Adjust max size as needed
        ]);

        // If a file is uploaded, store it in the public storage
        if ($request->hasFile('icon_image')) {
            $filePath = $request->file('icon_image')->store('images/our-commitments', 'public');
            $validator['icon_image'] = $filePath;
        }

        // Create a new HomeSlider record with the validated data
        $create = OurCommitments::create($validator);

        if ($create) {
            // Flash a success notification and redirect to the home-slider index page
            session()->flash('notif.success', 'Data added successfully!');
            return redirect()->route('our-commitments.index');
        }

        // If the creation failed, you may want to add an error flash message or handle it accordingly
        session()->flash('notif.error', 'Adding data failed!');
        return redirect()->back()->withInput();
    }

    public function createBanner()
    {
        $banner = new OurCommitmentBanner();
        return view('our-commitments.our-commitment-banner.create' ,compact('banner'));
    }

    public function storeBanner(Request $request)
    {
        $data = $request->only(['title', 'subtitle']);
        $banner = new OurCommitmentBanner();
        $banner->saveBanner($data);

        return redirect()->route('our_commitment_banner.create')->with('success', 'Banner saved successfully');
    }

    public function editBanner()
    {
        $banner = new OurCommitmentBanner();

        return view('our-commitments.our-commitment-banner.edit', compact('banner'));
    }

    public function updateBanner(Request $request)
    {
        $data = $request->only(['title', 'subtitle']);
        $banner = new OurCommitmentBanner();
        $banner->saveBanner($data);

        $updatedConfig = config('testimonial_banner');
        Log::info('Updated configuration:', $updatedConfig);

        return redirect()->route('our-commitments.index')->with('success', 'Banner updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(OurCommitments $ourCommitments)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(OurCommitments $ourCommitments)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, OurCommitments $ourCommitments)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(OurCommitments $ourCommitments)
    {
        //
    }
}
