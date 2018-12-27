@extends('app')
@section('title','Courses')
@section('page-heading','Courses')
@section('link','/courses/add');
@section('content')
<div class="container">
    <div class="row">
        @php
            $arr = json_decode($response, true);
            $data = $arr;
        @endphp
        @foreach ($data['data'] as $course)
            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12 mb-4 d-flex">
                <div class="card" >
                <img class="card-img-top" src="{{ Storage::url('course_banners/'.$course["image_url"]) }}" alt="{{ $course["name"] }}">
                    <div class="card-body d-flex-column">
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
<nav aria-label="Page navigation example">
    <ul class="pagination justify-content-center">
        @if ($data["prev_page_url"])
            <li class="page-item">
                <a class="page-link" href="{{ $data["prev_page_url"] }}" tabindex="-1">Previous</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="{{ $data["prev_page_url"] }}" tabindex="-1">Previous</a>
            </li>
        @endif
        <li class="page-item active"><a class="page-link" href="#">{{ $data["current_page"] }}<span class="sr-only">(current)</span></a></li>
        @if ($data["next_page_url"])
            <li class="page-item"><a class="page-link" href="{{ $data["next_page_url"] }}">{{ $data["current_page"]+1 }}</a></li>
            <li class="page-item">
                <a class="page-link" href="{{ $data["next_page_url"] }}">Next</a>
            </li>
        @else
            <li class="page-item disabled">
                <a class="page-link" href="{{ $data["next_page_url"] }}" tabindex="-1">Next</a>
            </li>
        @endif
    </ul>
</nav>
@endsection
