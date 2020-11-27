<?php

namespace App\Http\Controllers\Clink;

use App\Appointment;
use App\Clink;
use App\Doctor;
use Auth;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
   
    /**
     * Display a list of Appointments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $clink = Auth::guard('admin')->user()->clink;
        
        $appointments = $clink->appointments;

        return view('clink.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new Appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $clink = Auth::guard('admin')->user()->clink;
        $doctors = $clink->doctors;

        return view('clink.appointments.add', compact('doctors'));
    }

    /**
     * Save new Appointment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        // $clink = Auth::guard('admin')->user()->clink;
        $id = Auth::guard('admin')->user()->clink->id;
        request()->merge(['clink_id'=>$id]);
        $validatedData = request()->validate(Appointment::validationRules());

        $appointment = Appointment::create($validatedData);

        return redirect()->route('clink.appointments.index')->with([
            'type' => 'success',
            'message' => 'Appointment added'
        ]);
    }

    /**
     * Show the form for editing the specified Appointment
     *
     * @param \App\Appointment $appointment
     * @return \Illuminate\Http\Response
     */
    public function edit(Appointment $appointment)
    {
        $clink = Auth::guard('admin')->user()->clink;
       // $clink = Session::get('clink');
        $doctors = $clink->doctors;///::all();

        return view('clink.appointments.edit', compact('appointment', 'doctors'));
    }

    /**
     * Update the Appointment
     *
     * @param \App\Appointment $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Appointment $appointment)
    {
        $id = Auth::guard('admin')->user()->clink->id;
        request()->merge(['clink_id'=>$id]);
        $validatedData = request()->validate(
            Appointment::validationRules($appointment->id)
        );

        $appointment->update($validatedData);

        return redirect()->route('clink.appointments.index')->with([
            'type' => 'success',
            'message' => 'Appointment Updated'
        ]);
    }

    /**
     * Delete the Appointment
     *
     * @param \App\Appointment $appointment
     * @return void
     */
    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('clink.appointments.index')->with([
            'type' => 'success',
            'message' => 'Appointment deleted successfully'
        ]);
    }
}
