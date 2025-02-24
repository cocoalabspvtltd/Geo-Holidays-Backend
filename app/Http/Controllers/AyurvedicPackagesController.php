<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AyuvedicPackages\AyurvedicStoreRequest;
use App\Models\AyurvedicPackages;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class AyurvedicPackagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data= AyurvedicPackages::all();

        return view('ayurvedic-packages.index',['data' =>$data]);
    }

    public function create()
    {
        return view('ayurvedic-packages.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(AyurvedicStoreRequest $request): RedirectResponse
    {
        $input = $request->validated();

        if ($request->file('image')) {
            $filePath = Storage::disk('public')->put('files/ayurvedic-packages', $request->file('image'));
            $input['image'] = "$filePath";
        }

        $create = AyurvedicPackages::create($input);

        if ($create) {
            // Flash a success notification and redirect to the index page
            session()->flash('notif.success', 'Data Added successfully!');
            return redirect()->route('ayurvedic_packages.index');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(AyurvedicPackages $ayurvedicPackages): View
    {
        return view('ayurvedic-packages.show', compact('ayurvedicPackages'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AyurvedicPackages $ayurvedicPackages): View
    {
        return view('ayurvedic-packages.edit', compact('ayurvedicPackages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(AyurvedicStoreRequest $request, AyurvedicPackages $ayurvedicPackages): RedirectResponse
    {
        dd($request->all());   
        $input = $request->validated();

        if ($request->file('image')) {
            $filePath = Storage::disk('public')->put('files/ayurvedic-packages', $request->file('image'));
            $input['image'] = "$filePath";
        }else{
            unset($input['image']);
        }

        $update = $ayurvedicPackages->update($input);

        if ($update) {
            // Flash a success notification and redirect to the index page
            session()->flash('notif.success', 'Data Updated successfully!');
            return redirect()->route('ayurvedic_packages.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AyurvedicPackages $ayurvedicPackages): RedirectResponse
    {
        $ayurvedicPackages->delete();

        session()->flash('notif.success', 'Deleted successfully!');
            return redirect()->route('ayurvedic_packages.index');
    }
}
