<?php

namespace App\Http\Controllers\Clink;

use Auth;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Notifications\AdminCreated;
class AdminsController extends Controller
{
    
    /**
     * Display a list of Admins.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::guard('admin')->user()->clink->id;
        $admins = Admin::where('clink_id',$id)->paginate(10);

        return view('clink.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new Admin
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('clink.admins.add');
    }

    /**
     * Save new Admin
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $password = Str::random(6);
        $id = Auth::guard('admin')->user()->clink->id;
        request()->merge(['clink_id'=>$id]);

        request()->merge(['password'=>bcrypt($password)]);
        
        $validatedData = request()->validate(Admin::validationRules(null));
       
        $admin = Admin::create($validatedData);
       
        $admin->notify(new AdminCreated($admin->email,$admin->name,$password));



        return redirect()->route('clink.admins.index')->with([
            'type' => 'success',
            'message' => 'تمت الاضافة بنجاح'
        ]);
    }

    /**
     * Show the form for editing the specified Admin
     *
     * @param \App\Admin $admin
     * @return \Illuminate\Http\Response
     */
    public function edit(Admin $admin)
    {
        // $students = Student::all();
        // $teachers = Teacher::all();
        // $levels = Level::all();

        return view('clink.admins.edit',compact('admin'));
    }

    /**
     * Update the Admin
     *
     * @param \App\Admin $admin
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Admin $admin)
    {
        
        $validatedData = request()->validate(
            Admin::validationRules($admin->id)
        );

        $admin->update($validatedData);

        return redirect()->route('clink.admins.index')->with([
            'type' => 'success',
            'message' => 'تم التعديل بنجاح'
        ]);
    }

    /**
     * Delete the Admin
     *
     * @param \App\Admin $admin
     * @return void
     */
    public function destroy(Admin $admin)
    {
        $admin->toggleActivation();

        return redirect()->route('clink.admins.index')->with([
            'type' => 'success',
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
