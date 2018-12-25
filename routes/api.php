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

Route::resource('v1/courses', v1\CourseController::class);
Route::resource('v1/batches', v1\BatchController::class);
Route::resource('v1/faculties', v1\FacultyController::class);
Route::resource('v1/students', v1\StudentsController::class);
Route::resource('v1/students/{id}/fee', v1\FeeController::class);
Route::get('v1/students/{id}/fee/{fid}', 'v1\FeeController@show');
Route::put('v1/students/{id}fee/{fid}/pay', 'v1\FeeController@update');
