@extends('app')
@section('title','Courses')
@section('page-heading','View Course')
@section('content')
<div class="container p-4">
    @php
        $arr = json_decode($response, true);
    @endphp
    <form action="/api/v1/courses/{{$arr["id"]}}" method="post">
        @method('delete')
        <div class="form-group">
            <label class="form-label" for="course_id">Course Id</label>
        <input type="text" name="course_id" id="course_id" class="form-control" placeholder="Course Id" readonly value="{{ $arr["id"] }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="course_name">Course Name</label>
        <input type="text" name="course_name" id="course_name" class="form-control" placeholder="Course Name" value="{{ $arr["name"] }}" readonly>
        </div>
        <div class="form-group">
            <label class="form-label" for="duration">Duration</label>
            <input type="number" name="duration" id="duration" class="form-control" placeholder="Duration of course in months" value="{{ $arr["duration"] }}" readonly>
        </div>
        <div class="form-group">
            <label class="form-label" for="description">Description</label>
        <textarea type="text" name="description" id="description" class="form-control" placeholder="Short description of course" rows="3" readonly>{{ $arr["description"] }}</textarea>
        </div>
        <div class="form-group">
            <label class="form-label" for="total_fee">Total Fee</label>
        <input type="number" name="total_fee" id="total_fee" class="form-control" placeholder="Total fee" value="{{ $arr["total_fee"] }}" readonly>
        </div>
        <div class="form-group">
            <label class="form-label" for="image_url">Course Banner</label>
            {{-- <input type="file" name="image_url" id="image_url" class="form-control-file" placeholder="Select course banner file" accepts=".jpg,.jpeg"> --}}
        <img src="{{ Storage::url("/course_banners/".$arr["image_url"]) }}" class="img-responsive d-block w-50">
        </div>
        <div class="form-group">
            <label class="form-label" for="syllabus">Syllabus</label>
            {{-- <input type="file" name="syllabus" id="syllabus" class="form-control-file" placeholder="Select Syllabus file" accepts=".doc,.docx,.xls,.xlsx,.odt,.pdf"> --}}
        <a href="{{ $arr["syllabus_link"] }}" class="link d-block" download>Syllabus</a>
        </div>
        <button type="submit" class="btn btn-outline-dark">Delete</button>
    </form>
</div>
@endsection
