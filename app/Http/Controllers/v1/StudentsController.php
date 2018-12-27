<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Student;

class StudentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Student::paginate(28);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('photo'))
        {
            $original_filename = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($original_filename, PATHINFO_FILENAME);
            $ext = $request->file('photo')->getClientOriginalExtension();
            $filename_to_store = $filename.'_'.time().'.'.$ext;
            $path = $request->file('photo')->storeAs('public/student_images/',$filename_to_store);
        }
        else
        {
            $filename_to_store = 'profile-placeholder.png';
        }

        $student = new Student;
        $student->first_name = $request["first_name"];
        $student->middle_name = $request["middle_name"];
        $student->last_name = $request["last_name"];
        $student->email = $request["email"];
        $student->phone = $request["tel"];
        $student->qualification = $request["qualification"];
        $student->aadhar = $request["aadhar"];
        $student->photo_url = $filename_to_store;
        $student->faculty_id = $request["faculty_id"];
        $student->course_id = $request["course"];
        $student->save();

        return "data saved";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Student::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        if($request->hasFile('photo'))
        {
            $original_filename = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($original_filename, PATHINFO_FILENAME);
            $ext = $request->file('photo')->getClientOriginalExtension();
            $filename_to_store = $filename.'_'.time().'.'.$ext;
            $path = $request->file('photo')->storeAs('public/student_images/',$filename_to_store);
            $student->photo_url = $filename_to_store;
        }

        $student->first_name = $request["first_name"];
        $student->middle_name = $request["middle_name"];
        $student->last_name = $request["last_name"];
        $student->email = $request["email"];
        $student->phone = $request["tel"];
        $student->qualification = $request["qualification"];
        $student->aadhar = $request["aadhar"];
        $student->faculty_id = $request["faculty_id"];
        $student->course_id = $request["course"];
        $student->save();

        return "data saved";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->destroy();

        return 204;
    }
}
