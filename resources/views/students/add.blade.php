@extends('app')
@section('title','Students')
@section('page-heading','Add Student')
@section('content')
    <div class="container p-4">
        <form action="" method="post">
            <div class="row">
                <div class="col-md-3 mt-4">
                    <label for="photo" class="form-label">
                        <img class="w-100 d-block rounded border border-dark" src="{{ url('img/profile-placeholder.png') }}" alt="">
                        <small class="d-block text-muted-form-text text-center">Click on image to upload profile picture</small>
                    </label>
                    <input type="file" name="photo" id="photo" class="form-control-file" hidden>
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="sr" class="form-label">Student Id</label>
                        <input type="number" name="id" id="sr" class="form-control" readonly placeholder="Id">
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="form-label">First  Name</label>
                        <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name">
                    </div>
                    <div class="form-group">
                        <label for="middle_name" class="form-label">Middle  Name</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle Name">
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last  Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name">
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="name@domain.com">
            </div>
            <div class="form-group">
                <label for="tel" class="form-label">Phone no.</label>
                <input type="tel" name="tel" id="tel" class="form-control" placeholder="Phone number">
            </div>
            <div class="form-group">
                <label for="qualification" class="form-label">Qualification</label>
                <input type="text" name="qualification" id="qualification" class="form-control" placeholder="Bsc">
            </div>
            <div class="form-group">
                <label for="faculty_id" class="form-label">Faculty</label>
                <input type="text" name="faculty_id" id="faculty_id" class="form-control" placeholder="Faculty Id">
            </div>
            <div class="form-group">
                <label for="course" class="form-label">Course.</label>
                <input type="text" name="course" id="course" class="form-control" placeholder="Course Name">
            </div>
            <div class="form-group">
                <label for="aadhar" class="form-label">Aadhar No.</label>
                <input type="text" name="aadhar" id="aadhar" class="form-control" placeholder="0000 0000 0000">
            </div>
            <button type="submit" class="btn btn-outline-dark">Add Student</button>
        </form>
    </div>
@endsection
