<?php

namespace App\Http\Controllers\Admin;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Event;
use Session;

class AdminController extends Controller
{
    /**
     * Displays the dashboard page to the admin
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard()
    {
        dd("ok");

        return view('admin.dashboard');
    }

    /**
     * Displays the profile page to the admin
     *
     * @return \Illuminate\Http\Response
     */
    public function profile()
    {
        // /dd(Session::get('clink'));
        $admin = Auth::guard('admin')->user();

        return view('admin.profile', compact('admin'));
    }

    /**
     * Updates admin profile details
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function profileUpdate()
    {
        $validatedData = request()->validate(Admin::profileValidationRules());

        $admin = Auth::guard('admin')->user();

        $admin->update($validatedData);

        return back()->with(['type' => 'success', 'message' => 'Profile updated successfully']);
    }

    /**
     * Updates admin password
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function passwordUpdate()
    {
        $validatedData = request()->validate(Admin::passwordValidationRules());

        $admin = Auth::guard('admin')->user();

        if (Hash::check(request('current_password'), $admin->password)) {
            $admin->password = bcrypt(request('password'));
            $admin->save();

            return back()->with(['type' => 'success', 'message' => 'Password updated successfully']);
        }

        return back()->with(['type' => 'error', 'message' => 'Incorrect current password']);
    }
}
