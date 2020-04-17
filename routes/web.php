<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Admin routes
Route::name('admin.')->prefix('admin')->namespace('Admin')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        // Login
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login');

        // Forget and reset Password
        Route::get('forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('forgot_password');
        Route::post('forgot-password', 'ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}/{email?}', 'ResetPasswordController@showResetForm')->name('reset_password_link');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('reset_password');
    });

    // Logged in admin user required
    Route::group(['middleware' => 'auth:admin'], function () {
        // Dashboard
        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');



        Route::get('clinks','ClinkController@index');
        Route::get('clinks/add','ClinkController@create');
        Route::post('clinks','ClinkController@store');
        Route::get('clinks/{clink}/edit','ClinkController@edit');
        Route::put('clinks/{clink}','ClinkController@update');
        Route::delete('clink/{clink}', 'ClinkController@destroy'); 
            

        Route::resource('clinks', 'ClinkController');

        Route::resource('devices', 'DeviceController');

        Route::resource('specialties', 'SpecialtyController');

        Route::resource('doctors', 'DoctorController');

        Route::resource('tests', 'TestController');

        Route::resource('services', 'ServiceController');

        Route::resource('emergencies', 'EmergencyController');

        Route::resource('appointments', 'AppointmentController');

        // Profile
        Route::get('/profile', 'AdminController@profile')->name('profile');
        Route::post('/profile', 'AdminController@profileUpdate');
        Route::post('/password', 'AdminController@passwordUpdate')->name('password_update');

        // Logout
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
});

// Admin routes
Route::name('clink.')->prefix('clink')->namespace('Clink')->group(function () {
    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        // Login
        Route::get('/', 'LoginController@showLoginForm')->name('login');
        Route::post('/', 'LoginController@login');

        // Forget and reset Password
        Route::get('forgot-password', 'ForgotPasswordController@showLinkRequestForm')->name('forgot_password');
        Route::post('forgot-password', 'ForgotPasswordController@sendResetLinkEmail');
        Route::get('password/reset/{token}/{email?}', 'ResetPasswordController@showResetForm')->name('reset_password_link');
        Route::post('password/reset', 'ResetPasswordController@reset')->name('reset_password');
    });

    // Logged in admin user required
    Route::group(['middleware' => 'auth:admin'], function () {
        // Dashboard
        Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');

        Route::resource('clinks', 'ClinkController');

        Route::get('/clink', 'ClinkController@edit')->name('edit');
        Route::put('/clink/{clink}', 'ClinkController@update')->name('update');

        Route::resource('devices', 'DeviceController');

        Route::resource('specialties', 'SpecialtyController');

        Route::resource('doctors', 'DoctorController');

        Route::resource('tests', 'TestController');

        Route::resource('services', 'ServiceController');

        Route::resource('emergencies', 'EmergencyController');

        Route::resource('appointments', 'AppointmentController');

        // Profile
        Route::get('/profile', 'AdminController@profile')->name('profile');
        Route::post('/profile', 'AdminController@profileUpdate');
        Route::post('/password', 'AdminController@passwordUpdate')->name('password_update');

        // Logout
        Route::get('/logout', 'Auth\LoginController@logout')->name('logout');
    });
});