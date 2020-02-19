<?php

namespace App\Http\Controllers\Admin;

use App\Emergency;
use App\Clink;
use App\Http\Controllers\Controller;

class EmergencyController extends Controller
{
    /**
     * Display a list of Emergencies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $emergencies = Emergency::getList();

        return view('admin.emergencies.index', compact('emergencies'));
    }

    /**
     * Show the form for creating a new Emergency
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinks = Clink::all();

        return view('admin.emergencies.add', compact('clinks'));
    }

    /**
     * Save new Emergency
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Emergency::validationRules());

        $emergency = Emergency::create($validatedData);

        return redirect()->route('admin.emergencies.index')->with([
            'type' => 'success',
            'message' => 'Emergency added'
        ]);
    }

    /**
     * Show the form for editing the specified Emergency
     *
     * @param \App\Emergency $emergency
     * @return \Illuminate\Http\Response
     */
    public function edit(Emergency $emergency)
    {
        $clinks = Clink::all();

        return view('admin.emergencies.edit', compact('emergency', 'clinks'));
    }

    /**
     * Update the Emergency
     *
     * @param \App\Emergency $emergency
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Emergency $emergency)
    {
        $validatedData = request()->validate(
            Emergency::validationRules($emergency->id)
        );

        $emergency->update($validatedData);

        return redirect()->route('admin.emergencies.index')->with([
            'type' => 'success',
            'message' => 'Emergency Updated'
        ]);
    }

    /**
     * Delete the Emergency
     *
     * @param \App\Emergency $emergency
     * @return void
     */
    public function destroy(Emergency $emergency)
    {
        $emergency->delete();

        return redirect()->route('admin.emergencies.index')->with([
            'type' => 'success',
            'message' => 'Emergency deleted successfully'
        ]);
    }
}
