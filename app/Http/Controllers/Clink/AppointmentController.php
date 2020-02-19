<?php

namespace App\Http\Controllers\Clink;

use App\Appointment;
use App\Clink;
use App\Doctor;
use Auth;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    private $clink = "";
    
    public function __construct() {
        //$this->clink = Clink::find(Session::get('clink'));
       // dd(Session::get('clink'));
         //$this->clink = 
         dd(Auth::guard('admin')->user());//->clink;
    }
    
    /**
     * Display a list of Appointments.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        dd($this->clink);
        
        $appointments = $this->clink->appointments;

        return view('clink.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new Appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clink = Session::get('clink');
        $doctors = Doctor::all();

        return view('clink.appointments.add', compact('clink', 'doctors'));
    }

    /**
     * Save new Appointment
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
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
        $clink = Session::get('clink');
        $doctors = Doctor::all();

        return view('clink.appointments.edit', compact('appointment', 'clink', 'doctors'));
    }

    /**
     * Update the Appointment
     *
     * @param \App\Appointment $appointment
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Appointment $appointment)
    {
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
