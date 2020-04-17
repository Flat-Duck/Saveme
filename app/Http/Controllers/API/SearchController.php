<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Test;
use App\Clink;
use App\Doctor;
use App\Device;

class SearchController extends ApiController
{
    public function test()
    {
        $searchTerm = request()->term;
        $result = Test::query()->where('name', 'LIKE', "%{$searchTerm}%")->get();
        return $this->sendResponse("All Tests Are loaded", $result);   
    }
    public function clink()
    {
        $searchTerm = request()->term;
        $result = Clink::query()->where('name', 'LIKE', "%{$searchTerm}%")->get();
        return $this->sendResponse("All Clinks Are loaded", $result);
    }
    public function doctor()
    {
        $searchTerm = request()->term;
        $result = Doctor::query()->where('name', 'LIKE', "%{$searchTerm}%")->get();
        return $this->sendResponse("All Doctors Are loaded", $result);
    }
    public function device()
    {
        $searchTerm = request()->term;
        $result = Device::query()->where('name', 'LIKE', "%{$searchTerm}%")->get();
        return $this->sendResponse("All Devices Are loaded", $result);
    }
}
