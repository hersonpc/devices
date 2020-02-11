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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/sector')->group(function () {
    Route::get('/{sector}', 'SectorController@show')->name('api.sector.show');
    Route::delete('/{sector}', 'SectorController@destroy')->name('api.sector.delete');
    Route::post('/', 'SectorController@create')->name('api.sector.create');
});

Route::prefix('/device')->group(function () {
    Route::get('/{device}', 'DeviceController@show')->name('api.device.show');
});
