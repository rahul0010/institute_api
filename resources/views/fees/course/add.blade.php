@extends('app')
@section('title','Courses')
@section('page-heading','Add Course')
@section('content')
@php
    $response = getApiResponse('/api/v1/students/'.$id);
    $arr = json_decode($response, true);
    $newResponse = getApiResponse('/api/v1/courses/'.$arr["course_id"]);
    $course = json_decode($newResponse, true);
@endphp
<div class="container p-4">
    <form action="/api/v1/students/{{$id}}/fee" method="post" id="form">
        @csrf
        <div class="form-group">
            <label class="form-label" for="student_id">Student Id</label>
        <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Student Id" value="{{$id}}">
        </div>
        <div class="form-group">
            <label for="course" class="form-label">Course.</label>
            <input list="course_list" name="course" id="course" class="form-control" placeholder="Course Name" value="{{$arr["course_id"]}}">
        </div>
        <div class="form-group">
            <label class="form-label" for="duration">Duration</label>
        <input type="number" name="duration" id="duration" class="form-control" placeholder="Duration of course in months" value="{{ $course["duration"] }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="total_fee">Total Fee</label>
            <input type="number" name="total_fee" id="total_fee" class="form-control" placeholder="Total fee" value="{{ $course["total_fee"] }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="installment">Installment</label>
            <input type="number" name="installment" id="installment" class="form-control" placeholder="Installment Amount">
        </div>
        <div class="form-group">
            <label class="form-label" for="admission_fee">Admission Fee</label>
            <input type="number" name="admission_fee" id="admission_fee" class="form-control" placeholder="Admission Fee">
        </div>
        <div class="form-group">
            <label class="form-label" for="receiver">Receiver</label>
            <input type="text" name="receiver" id="receiver" class="form-control" placeholder="Receiver's Name" value="{{ Auth::user()->name }}" readonly>
        </div>
        <button type="submit" class="btn btn-outline-dark" id="submit">Add Course</button>
    </form>
</div>
@endsection
