<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::name("api.")->namespace('API')->group(function () {
    Route::name("search.")->prefix('search')->group(function () {
        Route::get('/clink','SearchController@clink');
        Route::get('/test','SearchController@test');
        Route::get('/doctor','SearchController@doctor');
        Route::get('/device','SearchController@device');
    });
    Route::name("clinks.")->prefix('clinks')->group(function () {
        Route::get('/','ClinkController@index');
        Route::get('/{clink}','ClinkController@show');
        Route::get('/{clink}/devices','ClinkController@devices');
        Route::get('/{clink}/doctors','ClinkController@doctors');
        Route::get('/{clink}/tests','ClinkController@tests');
     });
    Route::name("doctors.")->prefix('doctors')->group(function () {
        Route::get('/','DoctorController@index');
        Route::get('/{doctor}','DoctorController@show');
        Route::get('/{doctor}/clinks','DoctorController@clinks');
        Route::get('/{doctor}/specialty','DoctorController@specialty');
     });
    Route::name("tests.")->prefix('tests')->group(function () {
        Route::get('/','TestController@index');
        Route::get('/{test}/clinks','TestController@clinks');
     });
    Route::name("devices.")->prefix('devices')->group(function () {
        Route::get('/','DeviceController@index');
        Route::get('/{device}/clinks','DeviceController@clinks');
     });
     Route::name("specialties.")->prefix('specialties')->group(function () {
        Route::get('/','SpecialtyController@index');
        Route::get('/{Specialty}/clinks','DeviceController@clinks');
     });

     Route::get('/connection_check','HelperController@connection');
     Route::get('/update_check','HelperController@timeStamp');
    });