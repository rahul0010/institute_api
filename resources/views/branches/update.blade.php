@extends('app')
@section('title','Branches')
@section('page-heading','Update Branch')
@section('classes','d-none')
@section('content')
@php
    $data = json_decode($response, true);
@endphp
<div class="container p-4">
<form action="/api/v1/branches/{{ $data["id"] }}" method="post" id="form">
        @method('put')
        <div class="form-group">
            <label class="form-label" for="Branch">Branch Id</label>
        <input type="text" name="Branch" id="Branch" class="form-control" placeholder="Batch Id" readonly value="{{ $data["id"] }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="location">Location</label>
        <input type="text" name="location" id="location" class="form-control" value="{{ $data["location"] }}">
        </div>
        <button type="submit" class="btn btn-outline-dark" id="submit">Update Branch</button>
    </form>
</div>
@endsection
