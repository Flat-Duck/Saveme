<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Doctor;
class DoctorController  extends ApiController
{
    
    public function index()
    {
        $clinks = Doctor::all();
        return $this->sendResponse("All Doctors Loaded",$clinks);    
    }
    public function show(Doctor $doctor)
    {
        return $this->sendResponse("doctor Profile Loaded",$doctor);    
    }
    public function clinks(Doctor $doctor)
    {
        $clinks = $doctor->clinks;
        return $this->sendResponse("doctor clinks Loaded",$clinks);   
    }
    public function Specialty(Doctor $doctor)
    {
        $specialty = $doctor->specialty;
        return $this->sendResponse("doctor specialty Loaded",$specialty);
    }

}
// retages
// hala 


// shahd & maren
// wala
// sabha
// zamzam & nairouz