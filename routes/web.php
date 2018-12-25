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
    $response = getLastId('courses');
    return view('course.add', ['id' => $response]);
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
    $response = getLastId('batches');
    return view('batch.add', ['id' => $response]);
});

Route::get('/batches/{id}', function($id){
    $response = getApiResponse('/api/v1/batches/'.$id);
    return view('batch.view',['response' => $response]);
});

Route::get('/batches/{id}/update', function($id){
    $response = getApiResponse('/api/v1/batches/'.$id);
    return view('batch.update',['response' => $response]);
});

Route::get('/faculties',function(){
    $response = getApiResponse('/api/v1/faculties');
    return view('faculties.index', ['response' => $response ]);
});

Route::get('/faculties/add',function(){
    $response = getLastId('faculties');
    return view('faculties.add', ['id' => $response]);
});

Route::get('faculties/{id}', function($id){
    $response = getApiResponse("/api/v1/faculties/".$id);
    return view('faculties.view',["response" => $response]);
});

Route::get('faculties/{id}/update', function($id){
    $response = getApiResponse("/api/v1/faculties/".$id);
    return view('faculties.update',["response" => $response]);
});

Route::get('/students', function(){
    $response = getApiResponse('/api/v1/students');
    return view('students.index', ['response' => $response]);
});

Route::get('/students/add', function(){
    $id = getLastId('students');
    return view('students.add',["id" => $id]);
});

Route::get('students/{id}', function ($id) {
    $response = getApiResponse('/api/v1/students/'.$id);
    return view('students.view',["response" => $response]);
});

Route::get('/students/{id}/update', function($id){
    $response = getApiResponse('/api/v1/students/'.$id);
    return view('students.update',["response" => $response]);
});

Route::get('/students/{id}/fee', function($id){
    $response = getApiResponse('/api/v1/students/'.$id.'/fee');
    return view('fees.index',["response" => $response]);
});

Route::get('/students/{id}/course', function($id){
    return view('fees.course.add',["id" => $id]);
});

Route::get('/students/{id}/course/update', function(){
    return view('fees.course.update');
});

Route::get('/students/{id}/fee/{fid}/pay', function($id,$fid)
{
    return view('fees.pay',["id" => $id, "fid" => $fid]);
});
