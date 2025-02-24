<?php

namespace App\Http\Controllers;

use App\Models\Testimonials;
use App\Http\Controllers\Controller;
use App\Http\Requests\TestimonialFormRequest;
use App\Models\TestimonialBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TestimonialsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Testimonials::all();

        $banner = new TestimonialBanner();

        return view('testimonials.index', compact('data','banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('testimonials.create');
    }


    public function createBanner()
    {
        $banner = new TestimonialBanner();
        return view('testimonials.testimonial-banner.create' ,compact('banner'));
    }

    public function storeBanner(Request $request)
    {
        $data = $request->only(['title', 'subtitle']);
        $banner = new TestimonialBanner();
        $banner->saveBanner($data);

        return redirect()->route('testimonial_banner.create')->with('success', 'Banner saved successfully');
    }

    public function editBanner()
    {
        $banner = new TestimonialBanner();

        return view('testimonials.testimonial-banner.edit', compact('banner'));
    }

    public function updateBanner(Request $request)
    {
        $data = $request->only(['title', 'subtitle']);
        $banner = new TestimonialBanner();
        $banner->saveBanner($data);

        $updatedConfig = config('testimonial_banner');
        Log::info('Updated configuration:', $updatedConfig);

        return redirect()->route('testimonials.index')->with('success', 'Banner updated successfully');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TestimonialFormRequest $request)
    {
        $validator = $request->validated();
        $user_details = [];

        if ($request->has('user_name')) {
            $user_name = $request->input('user_name');
            $user_designation = $request->input('user_designation');
            $user_image = $request->input('user_image');

            $imagePath = $request->file('user_image')->store('testimonial_user_images', 'public');
            $user_details[] = [
                'user_name' => $user_name,
                'user_designation' => $user_designation,
                'user_image' => $imagePath,
            ];
        }

        $validator['user_details'] = json_encode($user_details);

        // Save to database or further processing
        // Assuming you have a Details model to save the data
        $create = Testimonials::create($validator);

        if ($create) {
            // Flash a success notification and redirect to the home-slider index page
            session()->flash('notif.success', 'Data added successfully!');
            return redirect()->route('testimonials.index');
        }

        // If the creation failed, you may want to add an error flash message or handle it accordingly
        session()->flash('notif.error', 'Adding data failed!');
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Testimonials $testimonials)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Testimonials $testimonial)
    {
        return view('testimonials.edit', compact('testimonial'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TestimonialFormRequest $request, Testimonials $testimonial)
    {
        $validator = $request->validated();
        $user_details = [];

        if ($request->has('user_name')) {

            $user_name = $request->user_name;
            $user_designation = $request->user_designation;
            $user_image = $request->user_image ?? null;

            // Decode the existing user_details to access its keys
            $existingUserDetails = json_decode($testimonial->user_details, true);
            $imagePath = null;

            if ($request->hasFile("user_image")) {
                $imagePath = $request->file("user_image")->store('testimonial_user_images', 'public');
            } else {
                // Check if the existing user_details array has the 'user_image' key
                $imagePath = $existingUserDetails['user_image'] ?? null;
            }

            $user_details[] = [
                'user_name' => $user_name,
                'user_designation' => $user_designation,
                'user_image' => $imagePath,
            ];
        }

        $validator['user_details'] = json_encode($user_details);

        // Update the testimonial
        $testimonial->update($validator);

        // Flash a success notification and redirect
        session()->flash('notif.success', 'Data updated successfully!');
        return redirect()->route('testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Testimonials $testimonial)
    {
        $testimonial->delete();

        session()->flash('notif.success', 'Data deleted successfully!');
        return redirect()->route('testimonials.index');
    }
}
