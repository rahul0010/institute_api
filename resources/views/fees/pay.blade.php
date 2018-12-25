@extends('app')
@section('title','Courses')
@section('page-heading','Payment')
@section('content')
<div class="container p-4">
<form action="/api/v1/students/{{$id}}/fee/{{$fid}}/pay" method="post">
        @method('put')
        <div class="form-group">
            <label class="form-label" for="student_id">Student Id</label>
        <input type="text" name="student_id" id="student_id" class="form-control" placeholder="Student Id" value="{{$id}}">
        </div>
        <div class="form-group">
            <label for="course" class="form-label">Course.</label>
            <input list="course_list" name="course" id="course" class="form-control" placeholder="Course Name">
        </div>
        <div class="form-group">
            <label class="form-label" for="total_fee">Total Fee</label>
            <input type="number" name="total_fee" id="total_fee" class="form-control" placeholder="Total fee">
        </div>
        <div class="form-group">
            <label class="form-label" for="installment">Installment</label>
            <input type="number" name="installment" id="installment" class="form-control" placeholder="Installment Amount" readonly>
        </div>
        <div class="form-group">
            <label class="form-label" for="payment_due">Payment Due</label>
            <input type="number" name="payment_due" id="payment_due" class="form-control" placeholder="Installment Amount" readonly>
        </div>
        <div class="form-group">
            <label class="form-label" for="amount">Amount</label>
            <input type="number" name="amount" id="amount" class="form-control" placeholder="Installment Amount">
        </div>
        <div class="form-group">
            <label class="form-label" for="balance">Balance</label>
            <input type="number" name="balance" id="balance" class="form-control" placeholder="Installment Amount">
        </div>
        <button type="submit" class="btn btn-outline-dark">Pay</button>
    </form>
</div>
@endsection
