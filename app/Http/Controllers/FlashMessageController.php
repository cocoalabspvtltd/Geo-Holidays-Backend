<?php

namespace App\Http\Controllers;

use App\Models\FlashMessage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FlashMessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $data = FlashMessage::all();

       return view('flash-message.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('flash-message.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        FlashMessage::create($input);

        return redirect()->route('flash-message.index')->with('success','Data Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(FlashMessage $flashMessage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(FlashMessage $flashMessage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FlashMessage $flashMessage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(FlashMessage $flashMessage)
    {
        //
    }
}
