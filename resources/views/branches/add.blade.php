@extends('app')
@section('title','Branch')
@section('page-heading','Add Branch')
@section('classes','d-none')
@section('content')
<div class="container p-4">
    <form action="/api/v1/branches" method="post" id="form">
        @csrf
        <div class="form-group">
            <label class="form-label" for="batch_id">Batch Id</label>
        <input type="number" name="batch_id" id="batch_id" class="form-control" placeholder="Batch Id" readonly value="{{ $id }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="location">Location</label>
            <input type="text" name="location" id="location" class="form-control">
        </div>
        <button type="submit" class="btn btn-outline-dark" id="submit">Add Branch</button>
    </form>
</div>
@endsection
