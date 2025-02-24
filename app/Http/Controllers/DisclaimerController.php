<?php

namespace App\Http\Controllers;

use App\Models\Disclaimer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DisclaimerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Disclaimer::all();

        return view('disclaimer.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('disclaimer.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        Disclaimer::create($input);

        return redirect()->route('disclaimer.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disclaimer $disclaimer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disclaimer $disclaimer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Disclaimer $disclaimer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disclaimer $disclaimer)
    {
        //
    }
}
