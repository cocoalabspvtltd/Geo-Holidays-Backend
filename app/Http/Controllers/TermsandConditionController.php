<?php

namespace App\Http\Controllers;

use App\Models\TermsandCondition;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TermsandConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = TermsandCondition::all();

        return view('terms-and-conditions.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('terms-and-conditions.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $input = $request->all();

        TermsandCondition::create($input);

        return redirect()->route('terms-and-conditions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(TermsandCondition $termsandCondition)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TermsandCondition $termsandCondition)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TermsandCondition $termsandCondition)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TermsandCondition $termsandCondition)
    {
        //
    }
}
