<?php

namespace App\Http\Controllers\Clink;

use App\Service;
use App\Clink;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Session;
use Auth;
use DB;
use App\Doctor;
use App\Server;
class ServiceController extends Controller
{
    /**
     * Display a list of Services.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $clink = Auth::guard('admin')->user()->clink;
        
        $services = $clink->servers;

        return view('clink.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new Service
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clink = Auth::guard('admin')->user()->clink;
        $services = Service::all();
      
        $doctors = $clink->doctors;
      
        return view('clink.services.add',compact('clink','doctors','services'));
    }

    /**
     * Save new Service
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
      //  dd($request->all());
        $clink = Auth::guard('admin')->user()->clink;
        request()->merge(['clink_id'=>$clink->id]);
        $validatedData = request()->validate($this->validationRules());
        DB::table('clink_service')->insert(
            ['clink_id'=>$clink->id ,'service_id' => $request->service_id,'doctor_id'=>$request->doctor_id]
        );
        return redirect()->route('clink.services.index')->with([
            'type' => 'success',
            'message' => 'Service added'
        ]);
    }
 /**
     * Validation rules
     *
     * @return array
     **/
    public static function validationRules()
    {
        return [
            'service_id' => 'required|numeric',
            'doctor_id' => 'required|numeric',
        ];
    }

    /**
     * Show the form for editing the specified Service
     *
     * @param \App\Service $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Server $service)
    {
        $clink = Auth::guard('admin')->user()->clink;
        $services = Service::all();

      
        $doctors = $clink->doctors;
        return view('clink.services.edit', compact('service','services','doctors'));
    }

    /**
     * Update the Service
     *
     * @param \App\Service $service
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Server $service)
    {
        $validatedData = request()->validate(
            $this->validationRules($service->id)
        );

        $service->update($validatedData);

        return redirect()->route('clink.services.index')->with([
            'type' => 'success',
            'message' => 'Service Updated'
        ]);
    }

    /**
     * Delete the Service
     *
     * @param \App\Service $service
     * @return void
     */
    public function destroy(Service $service)
    {
        if ($service->clinks()->count()) {
            return redirect()->route('clink.services.index')->with([
                'type' => 'error',
                'message' => 'This record cannot be deleted as there are relationship dependencies.'
            ]);
        }

        $service->delete();

        return redirect()->route('clink.services.index')->with([
            'type' => 'success',
            'message' => 'Service deleted successfully'
        ]);
    }
}
