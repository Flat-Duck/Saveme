<?php

namespace App\Http\Controllers\Admin;

use App\Doctor;
use App\Clink;
use App\Specialty;
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
        $doctors = Doctor::getList();

        return view('admin.doctors.index', compact('doctors'));
    }

    /**
     * Show the form for creating a new Doctor
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = Specialty::all();

        return view('admin.doctors.add', compact('specialties'));
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

        return redirect()->route('admin.doctors.index')->with([
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
        $specialties = Specialty::all();

        return view('admin.doctors.edit', compact('doctor', 'specialties'));
    }

    /**
     * Update the Doctor
     *
     * @param \App\Doctor $doctor
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Doctor $doctor)
    {
        //dd(request()->all());
        $validatedData = request()->validate(
            Doctor::validationRules($doctor->id)
        );

        unset($validatedData['picture']);
        $doctor->update($validatedData);
        if (request()->has('picture')) {
            $doctor->addMediaFromRequest('picture')->toMediaCollection('picture');
        }
        return redirect()->route('admin.doctors.index')->with([
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
            return redirect()->route('admin.doctors.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $doctor->delete();

        return redirect()->route('admin.doctors.index')->with([
            'type' => 'success',
            'message' => 'Doctor deleted successfully'
        ]);
    }
}
