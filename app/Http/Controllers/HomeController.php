<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\ContactDetails;
use App\Models\Testimonials;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $contact_details = ContactDetails::all();

        $testimonials = Testimonials::all();

        return view('dashboard',compact('contact_details','testimonials'));
    }
}
