<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageTour\StoreRequest;
use App\Http\Requests\PackageTourFormRequest;
use App\Models\PackageGalleryBanner;
use App\Models\PackageTour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class PackageTourController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PackageTour::all();

        return view('package-tour.index', ['data' => $data]);
    }

    public function create()
    {
        return view('package-tour.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // If a file is uploaded, store it in the public storage
        if ($image = $request->file('image')) {
            //$filePath = Storage::disk('public')->put('files/package-tour', request()->file('image'));
            $destinationPath = 'files/package-tour';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $validated['image'] = $profileImage;
            $validated['status'] = 1;
        }

        // Create a new task with the validated data
        $create = PackageTour::create($validated);

        if ($create) {
            // Flash a success notification and redirect to the task index page
            session()->flash('notif.success', 'Tour created successfully!');
            return redirect()->route('tour.index');
        }
    }

    public function createBanner()
    {
        $banner = new PackageGalleryBanner();
        return view('package-gallery-banner.create' ,compact('banner'));
    }

    public function storeBanner(Request $request)
    {
        $data = $request->only(['title', 'subtitle','description']);
        $banner = new PackageGalleryBanner();
        $banner->saveBanner($data);

        return redirect()->route('package_gallery_banner.create')->with('success', 'Banner saved successfully');
    }

    public function editBanner()
    {
        $banner = new PackageGalleryBanner();

        return view('package-gallery-banner.edit', compact('banner'));
    }

    public function updateBanner(Request $request)
    {
        $data = $request->only(['title', 'subtitle','description']);
        $banner = new PackageGalleryBanner();
        $banner->saveBanner($data);

        $updatedConfig = config('package_gallery_banner');
        Log::info('Updated configuration:', $updatedConfig);

        return redirect()->route('package_gallery_banner.index')->with('success', 'Banner updated successfully');
    }

    public function bannerIndex()
    {
        $banner = new PackageGalleryBanner();

        return view('package-gallery-banner.index', compact('banner'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = PackageTour::find($id);

        return view('package-tour.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, string $id)
    {

        $validated = $request->validated();
        $packageTour = PackageTour::find($id);

        // Check if the package tour exists
        if (!$packageTour) {
            return redirect()->route('tour.index')->with('error', 'Package tour not found.');
        }

        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($packageTour->image) {
                Storage::delete('public/' . $packageTour->image);
            }

            // Store the new image
            $destinationPath = 'files/package-tour';
            $imagePath = date('YmdHis') . "." . $request->image->getClientOriginalExtension();
            $request->image->move($destinationPath, $imagePath);
            $packageTour->image = $imagePath;
        }

        // Update the package tour with validated data except for the image
        $packageTour->update($validated);

        // Redirect with success message
        return redirect()->route('tour.index')->with('success', 'Package tour updated successfully.');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $packageTour = PackageTour::find($id);

        if (!$packageTour) {
            return redirect()->route('package-tour.index')->with('error', 'Package tour not found.');
        }

        $packageTour->delete();

        return redirect()->route('tour.index')->with('success', 'Package tour deleted successfully.');
    }
}
