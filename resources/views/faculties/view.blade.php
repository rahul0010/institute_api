@extends('app')
@section('title','Faculties')
@section('page-heading','View Faculty')
@section('content')
@php
    $data = json_decode($response, true);
@endphp
    <div class="container p-4">
    <form action="/api/v1/faculties/{{ $data["id"] }}" method="post">
        @method('put')
            <div class="row">
                <div class="col-md-3 mt-4">
                    <label for="photo" class="form-label">
                        <img class="w-100 d-block rounded border border-dark" src="{{ Storage::url('public/student_images/'.$data["photo_url"]) }}" alt="" id="resultImg">
                        {{-- <small class="d-block text-muted-form-text text-center">Click on image to change profile picture</small> --}}
                    </label>
                    {{-- <input type="file" name="photo" id="photo" class="form-control-file" hidden accept=".jpg,.jpeg,.png"> --}}
                </div>
                <div class="col-md-9">
                    <div class="form-group">
                        <label for="sr" class="form-label">Faculty Id</label>
                    <input type="number" name="id" id="sr" class="form-control" readonly placeholder="Id" value="{{ $data["id"] }}">
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="form-label">First  Name</label>
                    <input type="text" name="first_name" id="first_name" class="form-control" placeholder="First Name" value="{{ $data["first_name"] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="middle_name" class="form-label">Middle  Name</label>
                        <input type="text" name="middle_name" id="middle_name" class="form-control" placeholder="Middle Name" value="{{ $data["middle_name"] }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="last_name" class="form-label">Last  Name</label>
                        <input type="text" name="last_name" id="last_name" class="form-control" placeholder="Last Name" value="{{ $data["last_name"] }}" readonly>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" id="email" class="form-control" placeholder="name@domain.com" value="{{ $data["email"] }}" readonly>
            </div>
            <div class="form-group">
                <label for="tel" class="form-label">Phone no.</label>
                <input type="tel" name="tel" id="tel" class="form-control" placeholder="Phone number" value="{{ $data["phone"] }}" readonly>
            </div>
            <div class="form-group">
                <label for="designation" class="form-label">Designation</label>
                <input type="text" name="designation" id="designation" class="form-control" placeholder="Teacher" value="{{ $data["designation"] }}" readonly>
            </div>
            <div class="form-group">
                <label for="qualification" class="form-label">Qualification</label>
                <input type="text" name="qualification" id="qualification" class="form-control" placeholder="Bsc" value="{{ $data["qualification"] }}" readonly>
            </div>
            <div class="form-group">
                <label for="aadhar" class="form-label">Aadhar No.</label>
                <input type="text" name="aadhar" id="aadhar" class="form-control" placeholder="0000 0000 0000" value="{{ $data["aadhar"] }}" readonly>
            </div>
            {{-- <button type="submit" class="btn btn-outline-dark">Update Faculty</button> --}}
        </form>
    </div>
@endsection
