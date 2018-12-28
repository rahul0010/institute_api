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


Auth::routes();

Route::get('/', function () {
    return redirect('/students');
})->middleware('auth');

Route::get('/courses',function(){
    $response = getApiResponse('/api/v1/courses');
    return view('course.index', ['response' => $response ]);
})->middleware('auth');

Route::get('/courses/add', function(){
    $response = getLastId('courses');
    return view('course.add', ['id' => $response]);
})->middleware('auth');

Route::get('/courses/{id}', function($id){
    $response = getApiResponse('/api/v1/courses/'.$id);
    return view('course.view', ['response' => $response ]);
})->middleware('auth');

Route::get('/courses/{id}/update', function($id){
    $response = getApiResponse('/api/v1/courses/'.$id);
    return view('course.update',['response' => $response]);
})->middleware('auth');


Route::get('/batches',function(){
    $response = getApiResponse('/api/v1/batches');
    return view('batch.index', ['response' => $response ]);
})->middleware('auth');

Route::get('/batches/add',function(){
    $response = getLastId('batches');
    return view('batch.add', ['id' => $response]);
})->middleware('auth');

Route::get('/batches/{id}', function($id){
    $response = getApiResponse('/api/v1/batches/'.$id);
    return view('batch.view',['response' => $response]);
})->middleware('auth');

Route::get('/batches/{id}/update', function($id){
    $response = getApiResponse('/api/v1/batches/'.$id);
    return view('batch.update',['response' => $response]);
})->middleware('auth');

Route::get('/faculties',function(){
    $response = getApiResponse('/api/v1/faculties');
    return view('faculties.index', ['response' => $response ]);
})->middleware('auth');

Route::get('/faculties/add',function(){
    $response = getLastId('faculties');
    return view('faculties.add', ['id' => $response]);
})->middleware('auth');

Route::get('faculties/{id}', function($id){
    $response = getApiResponse("/api/v1/faculties/".$id);
    return view('faculties.view',["response" => $response]);
})->middleware('auth');

Route::get('faculties/{id}/update', function($id){
    $response = getApiResponse("/api/v1/faculties/".$id);
    return view('faculties.update',["response" => $response]);
})->middleware('auth');

Route::get('/students', function(){
    $response = getApiResponse('/api/v1/students');
    return view('students.index', ['response' => $response]);
})->middleware('auth');

Route::get('/students/add', function(){
    $id = getLastId('students');
    return view('students.add',["id" => $id]);
})->middleware('auth');

Route::get('students/{id}', function ($id) {
    $response = getApiResponse('/api/v1/students/'.$id);
    return view('students.view',["response" => $response]);
})->middleware('auth');

Route::get('/students/{id}/update', function($id){
    $response = getApiResponse('/api/v1/students/'.$id);
    return view('students.update',["response" => $response]);
})->middleware('auth');

Route::get('/students/{id}/fee', function($id){
    $response = getApiResponse('/api/v1/students/'.$id.'/fee');
    return view('fees.index',["response" => $response]);
})->middleware('auth');

Route::get('/students/{id}/course', function($id){
    return view('fees.course.add',["id" => $id]);
})->middleware('auth');

Route::get('/students/{id}/course/update', function(){
    return view('fees.course.update');
})->middleware('auth');

Route::get('/students/{id}/fee/{fid}/pay', function($id,$fid)
{
    $response = getApiResponse('/api/v1/students/'.$id.'/fee/'.$fid);
    return view('fees.pay',["id" => $id, "fee" => $response]);
})->middleware('auth');

Route::get('/branches', function(){
    $response = getApiResponse('/api/v1/branches');
    return view('branches.index',["response" => $response]);
})->middleware('auth');

Route::get('/branches/add', function()
{
    $response = getLastId('branches');
    return view('branches.add',["id" => $response]);
});

Route::get('/branches/{id}', function($id)
{
    $response = getApiResponse('/api/v1/branches/'.$id);
    return view('branches.view',["response" => $response]);
});

Route::get('/branches/{id}/update', function($id){
    $response = getApiResponse('/api/v1/branches/'.$id);
    return view('branches.update',["response" => $response]);
});

Route::get('/students/{id}/fee/{fid}/invoice', function($id, $fid){
    return view('fees.bill',["id" => $id, "fid" => $fid]);
});

Route::get('/home', function(){
    return redirect('/students');
});
