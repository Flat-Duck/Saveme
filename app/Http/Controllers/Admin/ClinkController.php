<?php

namespace App\Http\Controllers\Admin;

use App\Clink;
use App\Specialty;
use App\Test;
use App\Service;
use App\Http\Controllers\Controller;
use App\Admin;
use Str;
class ClinkController extends Controller
{
    /**
     * Display a list of Clinks.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clinks = Clink::getList();

        return view('admin.clinks.index', compact('clinks'));
    }

    /**
     * Show the form for creating a new Clink
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $specialties = Specialty::all();
        $tests = Test::all();
        $services = Service::all();

        return view('admin.clinks.add', compact('specialties', 'tests', 'services'));
    }

    /**
     * Save new Clink
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Clink::validationRules());

        unset($validatedData['cover'], $validatedData['specialties'], $validatedData['tests'], $validatedData['services']);
        $clink = Clink::create($validatedData);

        $admin = new Admin(); 
        $admin->name = request()->name;
        $admin->email = request()->email;
        $admin->username = strtok(request()->email, '@');
        $admin->password =  bcrypt('password');
        $admin->remember_token = Str::random(10);
        $admin->clink_id = $clink->id;
        $admin->save();

       return redirect()->route('admin.clinks.index')->with([
            'type' => 'success',
            'message' => 'Clink added'
        ]);
    }

    /**
     * Show the form for editing the specified Clink
     *
     * @param \App\Clink $clink
     * @return \Illuminate\Http\Response
     */
    public function edit(Clink $clink)
    {
        $specialties = Specialty::all();
        $tests = Test::all();
        $services = Service::all();

        $clink->specialties = $clink->specialties->pluck('id')->toArray();
        $clink->tests = $clink->tests->pluck('id')->toArray();
        $clink->services = $clink->services->pluck('id')->toArray();

        return view('admin.clinks.edit', compact('clink', 'specialties', 'tests', 'services'));
    }

    /**
     * Update the Clink
     *
     * @param \App\Clink $clink
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Clink $clink)
    {
        $validatedData = request()->validate(
            Clink::validationRules($clink->id)
        );

        unset($validatedData['cover'], $validatedData['specialties'], $validatedData['tests'], $validatedData['services']);
      
        $clink->update($validatedData);

        if (request()->has('cover')) {
            $clink->addMediaFromRequest('cover')->toMediaCollection('cover');
        }
      
        $clink->specialties()->sync(request('specialties'));
        $clink->tests()->sync(request('tests'));
        $clink->services()->sync(request('services'));

        return redirect()->route('admin.clinks.index')->with([
            'type' => 'success',
            'message' => 'Clink Updated'
        ]);
    }

    /**
     * Delete the Clink
     *
     * @param \App\Clink $clink
     * @return void
     */
    public function destroy(Clink $clink)
    {
        $clink->toggleActiv();

        return redirect()->route('admin.clinks.index')->with([
            'type' => 'success',
            'message' => 'Clink Status changed'
        ]);
    }
}
