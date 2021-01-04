<?php

namespace App\Http\Controllers\Admin;

use App\Device;
use App\Clink;
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
        $devices = Device::getList();

        return view('admin.devices.index', compact('devices'));
    }

    /**
     * Show the form for creating a new Device
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clinks = Clink::all();

        return view('admin.devices.add', compact('clinks'));
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
        if (request()->has('picture')) {
            $device->addMediaFromRequest('picture')->toMediaCollection('picture');
        }
        return redirect()->route('admin.devices.index')->with([
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
        $clinks = Clink::all();

        return view('admin.devices.edit', compact('device', 'clinks'));
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

        return redirect()->route('admin.devices.index')->with([
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

        return redirect()->route('admin.devices.index')->with([
            'type' => 'success',
            'message' => 'Device deleted successfully'
        ]);
    }
}
