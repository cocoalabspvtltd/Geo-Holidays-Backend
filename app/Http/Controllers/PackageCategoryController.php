<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PackageCategory\StoreRequest;
use App\Models\PackageCategory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PackageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PackageCategory::all();

        return view('package-category.index',['data'=>$data]);
    }

    public function create()
    {
        return view('package-category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        // If a file is uploaded, store it in the public storage
        if ($request->hasFile('image')) {
            $filePath = Storage::disk('public')->put('files/package-category', request()->file('image'));
            $validated['image'] = $filePath;
        }

        // Create a new task with the validated data
        $create = PackageCategory::create($validated);

        if($create) {
            // Flash a success notification and redirect to the task index page
            session()->flash('notif.success', 'Task created successfully!');
            return redirect()->route('category.index');
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
    public function edit(PackageCategory $packageCategory): View
    {
        return view('package-category.edit', compact('packageCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRequest $request, PackageCategory $packageCategory)
    {
        $validated = $request->validated();

        // If a file is uploaded, store it in the public storage
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('package-category', 'public');
            $validated['image'] = $filePath;

            if ($packageCategory->image) {
                Storage::disk('public')->delete($packageCategory->image);
            }
        }

        $update =$packageCategory->update($validated);

        if($update) {
            // Flash a success notification and redirect to the task index page
            session()->flash('notif.success', 'Data updated successfully!');
            return redirect()->route('category.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( PackageCategory $packageCategory)
    {
        $packageCategory->delete();

        return redirect()->route('category.index')
                         ->with('success', 'Data deleted successfully');
    }
}
