<?php

namespace App\Http\Controllers\v1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Faculty;

class FacultyController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Faculty::paginate(15);
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
            $path = $request->file('photo')->storeAs('public/faculty_images/',$filename_to_store);
        }
        else
        {
            $filename_to_store = 'profile-placeholder.png';
        }

        $faculty = new Faculty;
        $faculty->first_name = $request["first_name"];
        $faculty->middle_name = $request["middle_name"];
        $faculty->last_name = $request["last_name"];
        $faculty->email = $request["email"];
        $faculty->phone = $request["tel"];
        $faculty->designation = $request["designation"];
        $faculty->qualification = $request["qualification"];
        $faculty->aadhar = $request["aadhar"];
        $faculty->photo_url = $filename_to_store;
        $faculty->save();

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
        return Faculty::find($id);
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

        $faculty = Faculty::findOrFail($id);

        if($request->hasFile('photo'))
        {
            $original_filename = $request->file('photo')->getClientOriginalName();
            $filename = pathinfo($original_filename, PATHINFO_FILENAME);
            $ext = $request->file('photo')->getClientOriginalExtension();
            $filename_to_store = $filename.'_'.time().'.'.$ext;
            $path = $request->file('photo')->storeAs('public/faculty_images/',$filename_to_store);
            $faculty->photo_url = $filename_to_store;
        }

        $faculty->first_name = $request["first_name"];
        $faculty->middle_name = $request["middle_name"];
        $faculty->last_name = $request["last_name"];
        $faculty->email = $request["email"];
        $faculty->phone = $request["tel"];
        $faculty->designation = $request["designation"];
        $faculty->qualification = $request["qualification"];
        $faculty->aadhar = $request["aadhar"];
        $faculty->save();

        return "data updated";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $faculty = Faculty::findOrFail($id);
        $faculty->destroy();
        return 204;
    }
}
