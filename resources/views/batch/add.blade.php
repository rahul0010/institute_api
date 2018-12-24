@extends('app')
@section('title','Batches')
@section('page-heading','Add Batch')
@section('content')
<div class="container p-4">
    <form action="" method="post">
        <div class="form-group">
            <label class="form-label" for="batch_id">Batch Id</label>
            <input type="text" name="batch_id" id="batch_id" class="form-control" placeholder="Batch Id" readonly>
        </div>
        <div class="form-group">
            <label class="form-label" for="start_time">Start Time</label>
            <input type="time" name="start_time" id="start_time" class="form-control">
        </div>
        <div class="form-group">
            <label class="form-label" for="end_time">End Time</label>
            <input type="time" name="end_time" id="end_time" class="form-control">
            <small class="text-muted form-text">The batch timing can be from 10:00 to 11:00. Start time: 10:00 AM and End Time: 11:00 AM</small>
        </div>
        <button type="submit" class="btn btn-outline-dark">Add Batch</button>
    </form>
</div>
@endsection