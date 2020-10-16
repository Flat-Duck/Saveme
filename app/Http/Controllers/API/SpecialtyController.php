<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Specialty;
class SpecialtyController  extends ApiController
{
    public function index()
    {
        $specialties = Specialty::all();
        return $this->sendResponse("All Specialties Loaded",$specialties);    
    }
    public function clinks(Specialty $specialty)
    {
        $clinks = $specialty->clinks;
        return $this->sendResponse("Specialty clinks Loaded",$clinks);   
    }
    public function doctors(Specialty $specialty)
    {
        $doctors = $specialty->doctors;
        return $this->sendResponse("Specialty Doctors Loaded",$doctors);   
    }

}
