<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::apiResource('project','ProjectController');

Route::apiResource('task','TaskController')->only(['delete']);
Route::post('task/{project}/{user}', 'TaskController@store');
Route::get('task/{project}', 'TaskController@index')->name('task.index');

Route::apiResource('timeTrackingEntry','TimeTrackingEntryController');
Route::post('timeTrackingEntry/{user}/{task}', 'TimeTrackingEntryController@store');
