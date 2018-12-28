@extends('app')
@section('title','Students')
@section('page-heading','Update Student')
@section('classes','d-none')
@section('content')
@php
    $data = json_decode($response,true);
@endphp
    <div class="container p-4">
    <form action="/api/v1/students/{{ $data["id"] }}" method="post" enctype="multipart/form-data" id="form">
        @method('put')
            <div class="row">
                <div class="col-md-3 mt-4">
                    <label for="photo" class="form-label">
                        <img class="w-100 d-block rounded border border-dark" src="{{ Storage::url('public/student_images/'.$data["photo_url"]) }}" alt="" id="resultImg">
                        <small class="d-block text-muted-form-text text-center">Click on image to update profile picture</small>
                    </label>
                    <input type="file" name="photo" id="photo" class="form-control-file" hidden accept=".jpg,.jpeg,.png">
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="sr" class="form-label">Student Id</label>
                    <input type="number" name="id" id="sr" class="form-control" readonly placeholder="Id" value="{{ $data["id"] }}">
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="form-label">First  Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="{{ $data["first_name"] }}">
                    </div>
                    <div class="form-group">
                        <label for="middle_name" class="form-label">Middle  Name</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle Name" value="{{ $data["middle_name"] }}">
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last  Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{ $data["last_name"] }}">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="name@domain.com" value="{{ $data["email"] }}">
            </div>
            <div class="form-group">
                <label for="tel" class="form-label">Phone no.</label>
                <input type="tel" name="tel" id="tel" class="form-control" placeholder="Phone number" value="{{ $data["phone"] }}">
            </div>
            <div class="form-group">
                <label for="qualification" class="form-label">Qualification</label>
                <input type="text" name="qualification" id="qualification" class="form-control" placeholder="Bsc" value="{{ $data["qualification"] }}">
            </div>
            <div class="form-group">
                <label for="faculty_id" class="form-label">Faculty</label>
                <input list="faculty_list" name="faculty_id" id="faculty_id" class="form-control" placeholder="Faculty Id" value="{{ $data["faculty_id"] }}">
                @php
                    $request = getApiResponse('/api/v1/faculties');
                    $arr = json_decode($request,true);
                @endphp
                <datalist id="faculty_list">
                    @foreach ($arr["data"] as $faculty)
                    <option value="{{ $faculty["id"] }}">{{ $faculty["first_name"].' '.$faculty["middle_name"].' '.$faculty["last_name"] }}</option>
                    @endforeach
                </datalist>
            </div>
            <div class="form-group">
                <label for="course" class="form-label">Course.</label>
                <input list="course_list" name="course" id="course" class="form-control" placeholder="Course Name" value="{{ $data["course_id"] }}">
                @php
                    $request = getApiResponse('/api/v1/courses');
                    $arr = json_decode($request,true);
                @endphp
                <datalist id="course_list">
                    @foreach ($arr["data"] as $course)
                    <option value="{{ $course["id"] }}">{{ $course["name"] }}</option>
                    @endforeach
                </datalist>
            </div>
            <div class="form-group">
                <label for="branch" class="form-label">Branches</label>
            <input list="branch_list" name="branch" id="branch" class="form-control" placeholder="Branch Name" value="{{ $data["branch_id"] }}">
                @php
                    $request = getApiResponse('/api/v1/branches');
                    $arr = json_decode($request,true);
                @endphp
                <datalist id="branch_list">
                    @foreach ($arr["data"] as $branch)
                    <option value="{{ $branch["id"] }}">{{ $branch["location"] }}</option>
                    @endforeach
                </datalist>
            </div>
            <div class="form-group">
                <label for="aadhar" class="form-label">Aadhar No.</label>
                <input type="text" name="aadhar" id="aadhar" class="form-control" placeholder="0000 0000 0000" value="{{ $data["aadhar"] }}">
            </div>
            <button type="submit" class="btn btn-outline-dark" id="submit">Update Student</button>
        </form>
    </div>
@endsection
