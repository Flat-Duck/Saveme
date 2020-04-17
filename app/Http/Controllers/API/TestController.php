<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Test;
class TestController extends ApiController
{
    public function index()
    {
        $tests = Test::all();
        return $this->sendResponse("All Tests Loaded",$tests);    
    }

    public function clinks(Test $test)
    {
        $clinks = $test->clinks;
        return $this->sendResponse("test clinks Loaded",$clinks);   
    }
}
