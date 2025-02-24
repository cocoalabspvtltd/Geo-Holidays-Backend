<?php

namespace App\Http\Controllers;

use App\Models\WhyBookWithUS;
use App\Http\Controllers\Controller;
use App\Models\WhyBookUsBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class WhyBookWithUSController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = WhyBookWithUS::all();
        $banner = new WhyBookUsBanner();

        return view('why-book-with-us.index',compact('data','banner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('why-book-with-us.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->all();

        $imagePath = $request->file('icon_image')->store('why-book-with-us-icons', 'public');

        $validator['icon_image'] = $imagePath;

        // Save to database or further processing
        // Assuming you have a Details model to save the data
        $create = WhyBookWithUS::create($validator);

        if ($create) {
            // Flash a success notification and redirect to the home-slider index page
            session()->flash('notif.success', 'Data added successfully!');
            return redirect()->route('Why-book-with-us.index');
        }

        // If the creation failed, you may want to add an error flash message or handle it accordingly
        session()->flash('notif.error', 'Adding data failed!');
        return redirect()->back()->withInput();
    }

    public function createBanner()
    {
        $banner = new WhyBookUsBanner();
        return view('why-book-with-us.why-book-us-banner.create' ,compact('banner'));
    }

    public function storeBanner(Request $request)
    {
        $data = $request->only(['title', 'subtitle','description']);
        $banner = new WhyBookUsBanner();
        $banner->saveBanner($data);

        return redirect()->route('why_book_us_banner.create')->with('success', 'Banner saved successfully');
    }

    public function editBanner()
    {
        $banner = new WhyBookUsBanner();

        return view('why-book-with-us.why-book-us-banner.edit', compact('banner'));
    }

    public function updateBanner(Request $request)
    {
        $data = $request->only(['title', 'subtitle','description']);
        $banner = new WhyBookUsBanner();
        $banner->saveBanner($data);

        $updatedConfig = config('why_book_us_banner');
        Log::info('Updated configuration:', $updatedConfig);

        return redirect()->route('Why-book-with-us.index')->with('success', 'Banner updated successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(WhyBookWithUS $whyBookWithUS)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(WhyBookWithUS $whyBookWithUS)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WhyBookWithUS $whyBookWithUS)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(WhyBookWithUS $whyBookWithUS)
    {
        //
    }
}
