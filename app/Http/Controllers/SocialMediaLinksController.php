<?php

namespace App\Http\Controllers;

use App\Models\SocialMediaLinks;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SocialMediaLinksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =SocialMediaLinks::all();

        return view('social-media.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('social-media.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        SocialMediaLinks::create($input);

        return redirect()->route('social-media.index')->with('Data added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(SocialMediaLinks $socialMediaLinks)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SocialMediaLinks $socialMediaLinks)
    {
        return view('social-media.edit',compact('socialMediaLinks'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, SocialMediaLinks $socialMediaLinks)
    {
        $input = $request->all();

        $socialMediaLinks->update($input);

        return redirect()->route('social-media.index')->with('Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SocialMediaLinks $socialMediaLinks)
    {
        //
    }
}
