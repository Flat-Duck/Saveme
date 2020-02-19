<?php

namespace App\Http\Controllers\Clink;

use App\Doctor;
use App\Clink;
use App\Specialty;
use Session;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    /**
     * Display a list of Doctors.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Session::get('clink');
        $clink = Clink::find($id);
        
        $doctors = $clink->doctors;

        return view('clink.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new Doctor
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinks = Clink::all();
        $specialties = Specialty::all();

        return view('clink.doctors.add', compact('clinks', 'specialties'));
    }

    /**
     * Save new Doctor
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Doctor::validationRules());

        unset($validatedData['picture']);
        $doctor = Doctor::create($validatedData);

        $doctor->addMediaFromRequest('picture')->toMediaCollection('picture');

        return redirect()->route('clink.doctors.index')->with([
            'type' => 'success',
            'message' => 'Doctor added'
        ]);
    }

    /**
     * Show the form for editing the specified Doctor
     *
     * @param \App\Doctor $doctor
     * @return \Illuminate\Http\Response
     */
    public function edit(Doctor $doctor)
    {
        $clinks = Clink::all();
        $specialties = Specialty::all();

        return view('clink.doctors.edit', compact('doctor', 'clinks', 'specialties'));
    }

    /**
     * Update the Doctor
     *
     * @param \App\Doctor $doctor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Doctor $doctor)
    {
        $validatedData = request()->validate(
            Doctor::validationRules($doctor->id)
        );

        unset($validatedData['picture']);
        $doctor->update($validatedData);

        $doctor->addMediaFromRequest('picture')->toMediaCollection('picture');

        return redirect()->route('clink.doctors.index')->with([
            'type' => 'success',
            'message' => 'Doctor Updated'
        ]);
    }

    /**
     * Delete the Doctor
     *
     * @param \App\Doctor $doctor
     * @return void
     */
    public function destroy(Doctor $doctor)
    {
        if ($doctor->appointments()->count()) {
            return redirect()->route('clink.doctors.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $doctor->delete();

        return redirect()->route('clink.doctors.index')->with([
            'type' => 'success',
            'message' => 'Doctor deleted successfully'
        ]);
    }
}
