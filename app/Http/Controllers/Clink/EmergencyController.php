<?php

namespace App\Http\Controllers\Clink;

use App\Emergency;
use App\Clink;
use App\Http\Controllers\Controller;
use Session;
class EmergencyController extends Controller
{
    /**
     * Display a list of Emergencies.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

         $id = Session::get('clink');
        $clink = Clink::find($id);
        $emergencies = $clink->emergencies;

        return view('clink.emergencies.index', compact('emergencies'));
    }

    /**
     * Show the form for creating a new Emergency
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinks = Clink::all();

        return view('clink.emergencies.add', compact('clinks'));
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

        return redirect()->route('clink.emergencies.index')->with([
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

        return view('clink.emergencies.edit', compact('emergency', 'clinks'));
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

        return redirect()->route('clink.emergencies.index')->with([
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

        return redirect()->route('clink.emergencies.index')->with([
            'type' => 'success',
            'message' => 'Emergency deleted successfully'
        ]);
    }
}
