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
Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses',function(){
    $response = getApiResponse('/api/v1/courses');
    return view('course.index', ['response' => $response ]);
});

Route::get('/courses/add', function(){
    $response = getApiResponse('/api/v1/courses');
    return view('course.add', ['response' => $response ]);
});

Route::get('/courses/{id}', function($id){
    $response = getApiResponse('/api/v1/courses/'.$id);
    return view('course.view', ['response' => $response ]);
});

Route::get('/courses/{id}/update', function($id){
    $response = getApiResponse('/api/v1/courses/'.$id);
    return view('course.update',['response' => $response]);
});


Route::get('/batches',function(){
    $response = getApiResponse('/api/v1/batches');
    return view('batch.index', ['response' => $response ]);
});

Route::get('/batches/add',function(){
    return view('batch.add');
});

Route::get('/batches/{id}', function(){
    return view('batch.view');
});

Route::get('/batches/{id}/update', function(){
    return view('batch.update');
});

Route::get('/faculties',function(){
    $response = getApiResponse('/api/v1/faculties');
    return view('faculties.index', ['response' => $response ]);
});

Route::get('/faculties/add',function(){
    return view('faculties.add');
});

Route::get('faculties/{id}', function(){
    return view('faculties.view');
});

Route::get('faculties/{id}/update', function(){
    return view('faculties.update');
});

Route::get('/students', function(){
    $response = getApiResponse('/api/v1/students');
    return view('students.index', ['response' => $response]);
});

Route::get('students/{id}', function () {
    return view('students.view');
});

Route::get('/students/add', function(){
    return view('students.add');
});

Route::get('/students/{id}/update', function(){
    return view('students.update');
});

Route::get('students/{id}/fee', function(){
    return view('fee.index');
});

Route::get('students/{id}/course', function(){
    return view('fee.course.add');
});

Route::get('students/{id}/course/update', function(){
    return view('fee.course.update');
});

Route::get('students/{id}/pay', function()
{
    return view('fee.pay');
});
