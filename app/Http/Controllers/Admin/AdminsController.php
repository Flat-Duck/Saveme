<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
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
        $admins = Admin::getList();

        return view('admin.admins.index', compact('admins'));
    }

    /**
     * Show the form for creating a new Admin
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.admins.add');
    }

    /**
     * Save new Admin
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store()
    {
        $password = Str::random(6);

        request()->merge(['password'=>bcrypt($password)]);
        $validatedData = request()->validate(Admin::validationRules(null));
       // dd($validatedData);
        $admin = Admin::create($validatedData);
        $admin->notify(new AdminCreated($admin->email,$admin->name,$password));

        return redirect()->route('admin.admins.index')->with([
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

        return view('admin.admins.edit',compact('admin'));
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

        return redirect()->route('admin.admins.index')->with([
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

        return redirect()->route('admin.admins.index')->with([
            'type' => 'success',
            'message' => 'تم الحذف بنجاح'
        ]);
    }
}
