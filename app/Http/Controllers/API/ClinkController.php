<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Clink;

class ClinkController extends ApiController
{
    public function index()
    {
        $clinks = Clink::all();
        return $this->sendResponse("All Clinks Loaded",$clinks);    
    }
    public function show(Clink $clink)
    {
         $clink->load('doctors')->load("devices");
        return $this->sendResponse("Clink Profile Loaded",$clink);    
    }
    public function doctors(Clink $clink)
    {
        $doctors = $clink->doctors;
        return $this->sendResponse("Clink Doctors Loaded",$doctors);   
    }
    public function tests(Clink $clink)
    {
        $tests = $clink->tests;
        return $this->sendResponse("Clink Tests Loaded",$tests);
    }
    public function devices(Clink $clink)
    {
        $devices = $clink->devices;
        return $this->sendResponse("Clink Devices Loaded",$devices);
    }
}