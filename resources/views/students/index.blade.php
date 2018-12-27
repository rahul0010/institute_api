@extends('app')
@section('title','Students')
@section('page-heading','Students')
@section('content')
@section('link','/students/add');
<div class="container">
    <div class="row">
        @php
            $arr = json_decode($response, true);
            $data = $arr;
        @endphp
        @foreach ($data["data"] as $student)
            <div class="col-md-4 col-lg-3 col-sm-6 col-xs-12 mb-4 d-flex">
                <div class="card" >
                <img class="card-img-top" src="{{ Storage::url('public/student_images/'.$student["photo_url"]) }}" alt="{{ $student["first_name"]." ".$student["middle_name"]." ".$student["last_name"] }}" >
                    <div class="card-body d-flex-column">
                        <h5 class="card-title">{{ $student["first_name"]." ".$student["middle_name"]." ".$student["last_name"] }}</h5>
                        <span class="card-text d-block">{{ $student["email"] }}</span>
                        <span class="card-text d-block">+91 {{ $student["phone"] }}</span>
                        @php
                            $newresponse = getApiResponse('/api/v1/courses/'.$student["course_id"]);
                            $newarr = json_decode($newresponse,true);
                        @endphp
                        <span class="card-text d-block">{{ $newarr["name"] }}</span>
                        <span class="card-text d-block">
                            @php
                                $newresponse = getApiResponse('/api/v1/faculties/'.$student["faculty_id"]);
                                $newarr = json_decode($newresponse,true);
                            @endphp
                            {{ $newarr["first_name"].' '.$newarr["middle_name"].' '.$newarr["last_name"] }}
                        </span>
                    <span class="card-text d-block"><a href="/students/{{ $student["id"] }}" class="card-link">View</a></span>
                    <span class="card-text d-block"><a href="/students/{{ $student["id"] }}/update" class="card-link">Update</a></span>
                    <span class="card-text d-block"><a href="/students/{{ $student["id"] }}/fee" class="card-link">Fee Payment</a></span>
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
