@extends('app')
@section('title','Courses')
@section('page-heading','Courses')
@section('link','/courses/add')
@section('content')
<div class="container">
    <div class="row">
        @php
            $arr = json_decode($response, true);
        @endphp
        @foreach ($arr as $course)
            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12 mb-4 d-flex">
                <div class="card" >
                    <img class="card-img-top" src="{{ Storage::url('course_banners/'.$course["image_url"]) }}" alt="{{ $course["name"] }}">
                    <div class="card-body d-flex-column img-responsive">
                        <h5 class="card-title">{{ $course["name"] }}</h5>
                        <span class="card-text d-block">Duration: {{ $course["duration"] }} months</span>
                        <span class="card-text d-block truncate">{{ $course["description"] }}</span>
                        <span class="card-text d-block"><a href="/courses/{{ $course["id"] }}" class="card-link">View</a></span>
                        <span class="card-text d-block"><a href="/courses/{{ $course["id"] }}/update" class="card-link">Update</a></span>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
