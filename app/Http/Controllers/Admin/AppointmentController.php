<?php

namespace App\Http\Controllers\Admin;

use App\Appointment;
use App\Clink;
use App\Doctor;
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
        $appointments = Appointment::getList();

        return view('admin.appointments.index', compact('appointments'));
    }

    /**
     * Show the form for creating a new Appointment
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinks = Clink::all();
        $doctors = Doctor::all();

        return view('admin.appointments.add', compact('clinks', 'doctors'));
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

        return redirect()->route('admin.appointments.index')->with([
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
        $clinks = Clink::all();
        $doctors = Doctor::all();

        return view('admin.appointments.edit', compact('appointment', 'clinks', 'doctors'));
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

        return redirect()->route('admin.appointments.index')->with([
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

        return redirect()->route('admin.appointments.index')->with([
            'type' => 'success',
            'message' => 'Appointment deleted successfully'
        ]);
    }
}
