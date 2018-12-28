@extends('app')
@section('title','Courses')
@section('page-heading','Payment')
@section('content')
<div class="container p-4">
@php
    $fee_data = json_decode($fee, true)[0];
@endphp
<form action="/api/v1/students/{{$id}}/fee/{{$fee_data["id"]}}" method="post">
        @method('put')
        <div class="form-group">
            <label class="form-label" for="student_id">Student Id</label>
        <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Student Id" value="{{$id}}" readonly>
        </div>
        <div class="form-group">
            <label for="course" class="form-label">Course.</label>
        <input list="course_list" name="course" id="course" class="form-control" placeholder="Course Name" value="{{ $fee_data["course_id"] }}" readonly>
        </div>
        <div class="form-group">
            <label class="form-label" for="total_fee">Total Fee</label>
        <input type="number" name="total_fee" id="total_fee" class="form-control" placeholder="Total fee" value="{{ $fee_data["total_fees"]}}" readonly>
        </div>
        <div class="form-group">
            <label class="form-label" for="installment">Installment Amount</label>
            <input type="number" name="installment" id="installment" class="form-control" placeholder="Installment Amount" value="{{ $fee_data["installment_amount"] }}" readonly>
        </div>
        <div class="form-group">
            <label class="form-label" for="payment_due">Payment Due</label>
            <input type="date" name="payment_due" id="payment_due" class="form-control" placeholder="Payment due" value="{{ $fee_data["payment_due"] }}" readonly>
        </div>
        <div class="form-group">
            <label class="form-label" for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" placeholder="Installment Amount">
        </div>
        <div class="form-group">
            <label class="form-label" for="balance">Balance</label>
            <input type="number" name="balance" id="balance" class="form-control" placeholder="Balance"  value="{{ $fee_data["balance"] }}">
        </div>
        <div class="form-group">
            <label class="form-label" for="receiver">Receiver</label>
            <input type="text" name="receiver" id="receiver" class="form-control" placeholder="Receiver's name"  value="{{ Auth::user()->name }}">
        </div>
        <button type="submit" class="btn btn-outline-dark">Pay</button>
    </form>
</div>
@endsection
