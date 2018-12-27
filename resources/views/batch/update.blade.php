@extends('app')
@section('title','Batches')
@section('page-heading','Update Batch')
@section('classes','d-none')
@section('content')
@php
    $data = json_decode($response, true);
@endphp
<div class="container p-4">
<form action="/api/v1/batches/{{ $data["id"] }}" method="post">
        @method('put')
        <div class="form-group">
            <label class="form-label" for="batch_id">Batch Id</label>
        <input type="text" name="batch_id" id="batch_id" class="form-control" placeholder="Batch Id" readonly value="{{ $data["id"] }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="start_time">Start Time</label>
        <input type="time" name="start_time" id="start_time" class="form-control" value="{{ $data["start_time"] }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="end_time">End Time</label>
        <input type="time" name="end_time" id="end_time" class="form-control" value="{{ $data["end_time"] }}">
            <small class="text-muted form-text">The batch timing can be from 10:00 to 11:00. Start time: 10:00 AM and End Time: 11:00 AM</small>
        </div>
        <button type="submit" class="btn btn-outline-dark">Update Batch</button>
    </form>
</div>
@endsection
