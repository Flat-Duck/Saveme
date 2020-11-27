<?php

namespace App\Http\Controllers\clink;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Clink;
use App\Specialty;
use App\Test;
use App\Service;
use App\Doctor;
use App\Device;
use Auth;

class ReactiveController extends Controller
{
     /**
     * Show the form for editing the specified Clink
     *
     * @param \App\Clink $clink
     * @return \Illuminate\Http\Response
     */
    public function show(Clink $clink1)
    {
        $clink = Auth::guard('admin')->user()->clink;


         $specialties = Specialty::all();
         $tests = Test::all();
         $services = Service::all();
         $devices = Device::all();
         $doctors = Doctor::all();

        //  $clink = Auth::guard('admin')->user()->clink;

        //  $specialties = Specialty::all();
        //  $tests = Test::all();
        //  $services = Service::all();
 
     
         $clink->doctors = $clink->doctors->pluck('id')->toArray();
         $clink->devices = $clink->devices->pluck('id')->toArray();
         $clink->specialties = $clink->specialties->pluck('id')->toArray();
         $clink->tests = $clink->tests->pluck('id')->toArray();
         $clink->services = $clink->services->pluck('id')->toArray();
 
        // return view('clink.clinks.edit', compact('clink', 'specialties', 'tests', 'services'));


      //  dd($clink);
     // $specialties = $clink->specialties = $clink->specialties->pluck('id')->toArray();
        // $clink->tests = $clink->tests->pluck('id')->toArray();
        // $clink->services = $clink->services->pluck('id')->toArray();

        return view('clink.reactive', compact('clink', 'specialties', 'tests', 'services','devices','doctors'));
    }

    public function update(Request $request)
    {
        $clink = Auth::guard('admin')->user()->clink;

        $clink->specialties()->sync(request('specialties'));
        $clink->tests()->sync(request('tests'));
        // $clink->services()->sync(request('services'));
        $clink->doctors()->sync(request('doctors'));
        $clink->devices()->sync(request('devices'));

        return redirect()->route('clink.reactive')->with([
            'type' => 'success',
            'message' => 'Clink Updated'
        ]);
      //  dd($request->all());
    }
}
