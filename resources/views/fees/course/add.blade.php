@extends('app')
@section('title','Courses')
@section('page-heading','Add Course')
@section('content')
<div class="container p-4">
    <form action="/api/v1/students/{{$id}}/fee" method="post">
        @csrf
        <div class="form-group">
            <label class="form-label" for="student_id">Student Id</label>
        <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Student Id" value="{{$id}}">
        </div>
        <div class="form-group">
            <label for="course" class="form-label">Course.</label>
            <input list="course_list" name="course" id="course" class="form-control" placeholder="Course Name">
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
            <label class="form-label" for="duration">Duration</label>
            <input type="number" name="duration" id="duration" class="form-control" placeholder="Duration of course in months">
        </div>
        <div class="form-group">
            <label class="form-label" for="total_fee">Total Fee</label>
            <input type="number" name="total_fee" id="total_fee" class="form-control" placeholder="Total fee">
        </div>
        <div class="form-group">
            <label class="form-label" for="installment">Installment</label>
            <input type="number" name="installment" id="installment" class="form-control" placeholder="Installment Amount">
        </div>
        <div class="form-group">
            <label class="form-label" for="admission_fee">Admission Fee</label>
            <input type="number" name="admission_fee" id="admission_fee" class="form-control" placeholder="Admission Fee">
        </div>
        <button type="submit" class="btn btn-outline-dark">Add Course</button>
    </form>
</div>
@endsection
