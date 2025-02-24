<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Blog::all();

        return view('blog.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Adjust max size as needed
        ]);

        // If a file is uploaded, store it in the public storage
        if ($request->hasFile('image')) {
            $filePath = $request->file('image')->store('images/blog-images', 'public');
            $validator['image'] = $filePath;
        }

        // Create a new HomeSlider record with the validated data
        $create = Blog::create($validator);

        if ($create) {
            // Flash a success notification and redirect to the home-slider index page
            session()->flash('notif.success', 'Data added successfully!');
            return redirect()->route('blogs.index');
        }

        // If the creation failed, you may want to add an error flash message or handle it accordingly
        session()->flash('notif.error', 'Adding data failed!');
        return redirect()->back()->withInput();
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}
