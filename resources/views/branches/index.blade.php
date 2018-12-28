@extends('app')
@section('title','Batches')
@section('page-heading','Batches')
@section('link','/branches/add')
@section('content')
<div class="container">
    @php
        $arr = json_decode($response,true);
        $data = $arr
    @endphp
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
            <th scope="col">Id</th>
            <th scope="col">Location</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data['data'] as $branch)
                <tr>
                <th scope="row">{{ $branch["id"] }}</th>
                    <td> {{ $branch["location"] }}</td>
                    <td><a href="/branches/{{ $branch["id"] }}">View</a>&nbsp;&nbsp;&nbsp;&nbsp;<a href="/branches/{{ $branch["id"] }}/update">update</a></td>
                </tr>
            @endforeach
        </tbody>
        </table>
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
