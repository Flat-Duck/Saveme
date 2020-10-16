<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Device;
class DeviceController  extends ApiController
{
    public function index()
    {
        $devices = Device::all();
        return $this->sendResponse("All Devices Loaded",$devices);    
    }

    public function clinks(Device $device)
    {
        $clinks = $device->clinks;
        return $this->sendResponse("device clinks Loaded",$clinks);   
    }
}
