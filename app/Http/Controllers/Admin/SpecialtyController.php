<?php

namespace App\Http\Controllers\Admin;

use App\Specialty;
use App\Http\Controllers\Controller;

class SpecialtyController extends Controller
{
    /**
     * Display a list of Specialties.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $specialties = Specialty::getList();

        return view('admin.specialties.index', compact('specialties'));
    }

    /**
     * Show the form for creating a new Specialty
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.specialties.add');
    }

    /**
     * Save new Specialty
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Specialty::validationRules());

        $specialty = Specialty::create($validatedData);

        return redirect()->route('admin.specialties.index')->with([
            'type' => 'success',
            'message' => 'Specialty added'
        ]);
    }

    /**
     * Show the form for editing the specified Specialty
     *
     * @param \App\Specialty $specialty
     * @return \Illuminate\Http\Response
     */
    public function edit(Specialty $specialty)
    {
        return view('admin.specialties.edit', compact('specialty'));
    }

    /**
     * Update the Specialty
     *
     * @param \App\Specialty $specialty
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Specialty $specialty)
    {
        $validatedData = request()->validate(
            Specialty::validationRules($specialty->id)
        );

        $specialty->update($validatedData);

        return redirect()->route('admin.specialties.index')->with([
            'type' => 'success',
            'message' => 'Specialty Updated'
        ]);
    }

    /**
     * Delete the Specialty
     *
     * @param \App\Specialty $specialty
     * @return void
     */
    public function destroy(Specialty $specialty)
    {
        if ($specialty->clinks()->count() || $specialty->doctors()->count()) {
            return redirect()->route('admin.specialties.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $specialty->delete();

        return redirect()->route('admin.specialties.index')->with([
            'type' => 'success',
            'message' => 'Specialty deleted successfully'
        ]);
    }
}
