@extends('app')
@section('title','Branche')
@section('page-heading','View Branch')
@section('classes','d-none')
@section('content')
@php
    $data = json_decode($response, true);
@endphp
<div class="container p-4">
    <form action="" method="post">
        @csrf
        <div class="form-group">
            <label class="form-label" for="branch_id">Branch Id</label>
        <input type="text" name="branch_id" id="branch_id" class="form-control" placeholder="Batch Id" readonly value="{{ $data["id"] }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="location">Location</label>
        <input type="text" name="location" id="location" class="form-control" value="{{ $data["location"] }}" readonly>
        </div>
        {{-- <button type="submit" class="btn btn-outline-dark">Update Batch</button> --}}
    </form>
</div>
@endsection
