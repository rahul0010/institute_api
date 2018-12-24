<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Course;
// use App\Services\v1\CourseService;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Course::paginate(15);
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
        $this->validate($request, [
            'photo_url' => 'image|nullable'
        ]);

        //Handle File upload
        if($request->hasFile('image_url'))
        {
            //Get file name
            $filename_with_extension = $request->file('image_url')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filename_with_extension, PATHINFO_FILENAME);
            //get ext
            $ext = $request->file('image_url')->getClientOriginalExtension();
            $filename_to_store = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image_url')->storeAs('public/course_banners', $filename_to_store);
        }
        else
        {
            $filename_to_store = 'profile-placeholder.png';
        }

        if($request->hasFile('syllabus'))
        {
            //Get file name
            $filename_with_extension = $request->file('syllabus')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filename_with_extension, PATHINFO_FILENAME);
            //get ext
            $ext = $request->file('syllabus')->getClientOriginalExtension();
            $syllabus_to_store = $filename.'_'.time().'.'.$ext;
            $path = $request->file('syllabus')->storeAs('public/syllabus', $syllabus_to_store);
        }
        else
        {
            $syllabus_to_store = 'null';
        }

        $course = new Course;
        $course->name = $request->input('course_name');
        $course->description = $request->input('description');
        $course->duration = $request->input('duration');
        $course->total_fee = $request->input('total_fee');
        $course->image_url = $filename_to_store;
        $course->syllabus_link = $syllabus_to_store;
        $course->save();

        return "File saved";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Course::find($id);
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
        $course = Course::findOrFail($id);
        $course->name = $request->input('course_name');
        $course->description = $request->input('description');
        $course->duration = $request->input('duration');
        $course->total_fee = $request->input('total_fee');

        //Handle File upload
        if($request->hasFile('image_url'))
        {
            //Get file name
            $filename_with_extension = $request->file('image_url')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filename_with_extension, PATHINFO_FILENAME);
            //get ext
            $ext = $request->file('image_url')->getClientOriginalExtension();
            $filename_to_store = $filename.'_'.time().'.'.$ext;
            $path = $request->file('image_url')->storeAs('public/course_banners', $filename_to_store);
            $course->image_url = $filename_to_store;
        }

        if($request->hasFile('syllabus'))
        {
            //Get file name
            $filename_with_extension = $request->file('syllabus')->getClientOriginalName();
            //Get just file name
            $filename = pathinfo($filename_with_extension, PATHINFO_FILENAME);
            //get ext
            $ext = $request->file('syllabus')->getClientOriginalExtension();
            $syllabus_to_store = $filename.'_'.time().'.'.$ext;
            $path = $request->file('syllabus')->storeAs('public/syllabus', $syllabus_to_store);
            $course->syllabus_link = $syllabus_to_store;
        }
        $course->save();

        return "File saved";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->delete();

        return 204;
    }
}
