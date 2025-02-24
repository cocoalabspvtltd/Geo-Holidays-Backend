<?php

namespace App\Http\Controllers;

use App\Models\PrivacyPolicy;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PrivacyPolicyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = PrivacyPolicy::all();

        return view('privacy-policy.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        returN view("privacy-policy.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $input = $request->all();

        PrivacyPolicy::create($input);

        return redirect()->route('privacy-policy.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PrivacyPolicy $privacyPolicy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PrivacyPolicy $privacyPolicy)
    {
        //
    }
}
