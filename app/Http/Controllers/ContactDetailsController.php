<?php

namespace App\Http\Controllers;

use App\Models\ContactDetails;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContactDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = ContactDetails::all();

        return view('contact-details.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('contact-details.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       $input = $request->all();

       ContactDetails::create($input);

       return redirect()->route('contact-details.index')->with('Data Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(ContactDetails $contactDetails)
    {
        //return view('contact-details.edit',compact('contactDetails'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ContactDetails $contactDetails)
    {
        return view('contact-details.edit',compact('contactDetails'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ContactDetails $contactDetails)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ContactDetails $contactDetails)
    {
        //
    }
}
