<?php

namespace App\Http\Controllers\Clink;

use App\Device;
use App\Clink;
use Session;
use Auth;
use App\Http\Controllers\Controller;

class DeviceController extends Controller
{
    /**
     * Display a list of Devices.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clink = Auth::guard('admin')->user()->clink;
      
        $devices = $clink->devices;
        
        return view('clink.devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new Device
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clink = Auth::guard('admin')->user()->clink;


        return view('clink.devices.add', compact('clink'));
    }

    /**
     * Save new Device
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $validatedData = request()->validate(Device::validationRules());

        unset($validatedData['picture']);
        $device = Device::create($validatedData);

        $device->addMediaFromRequest('picture')->toMediaCollection('picture');

        return redirect()->route('clink.devices.index')->with([
            'type' => 'success',
            'message' => 'Device added'
        ]);
    }

    /**
     * Show the form for editing the specified Device
     *
     * @param \App\Device $device
     * @return \Illuminate\Http\Response
     */
    public function edit(Device $device)
    {
        $clink = Session::get('clink');

        return view('clink.devices.edit', compact('device', 'clink'));
    }

    /**
     * Update the Device
     *
     * @param \App\Device $device
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Device $device)
    {
        $validatedData = request()->validate(
            Device::validationRules($device->id)
        );

        unset($validatedData['picture']);
        $device->update($validatedData);

        $device->addMediaFromRequest('picture')->toMediaCollection('picture');

        return redirect()->route('clink.devices.index')->with([
            'type' => 'success',
            'message' => 'Device Updated'
        ]);
    }

    /**
     * Delete the Device
     *
     * @param \App\Device $device
     * @return void
     */
    public function destroy(Device $device)
    {
        $device->delete();

        return redirect()->route('clink.devices.index')->with([
            'type' => 'success',
            'message' => 'Device deleted successfully'
        ]);
    }
}
