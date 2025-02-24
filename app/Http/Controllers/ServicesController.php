<?php

namespace App\Http\Controllers;

use App\Models\Services;
use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceRequest;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Services::all();

        return view('services.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view('services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ServiceRequest $request)
    {
        $input = $request->validated();

        if ($request->file('icon_image')) {
            $filePath = Storage::disk('public')->put('files/services', $request->file('icon_image'));
            $input['icon_image'] = "$filePath";
        }

        $create = Services::create($input);

        if ($create) {
            // Flash a success notification and redirect to the index page
            session()->flash('notif.success', 'Data Added successfully!');
            return redirect()->route('services.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Services $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Services $service): View
    {
        return view('services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ServiceRequest $request, Services $service): RedirectResponse
    {
        $input = $request->validated();

        if ($request->file('icon_image')) {
            $filePath = Storage::disk('public')->put('files/services', $request->file('icon_image'));
            $input['icon_image'] = "$filePath";
        }else{
            unset($input['icon_image']);
        }

        $update = $service->update($input);

        if ($update) {
            // Flash a success notification and redirect to the index page
            session()->flash('notif.success', 'Data Updated successfully!');
            return redirect()->route('services.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Services $service)
    {
       $service->delete();

       return redirect()->route('services.index');
    }
}
