@extends('app')
@section('title','Fees')
@section('page-heading','Fee Details')
@section('content')
<div class="container">
    @php
        $arr = json_decode($response,true);
    @endphp
    <table class="table table-hover table-striped table-bordered">
        <thead>
            <tr>
            <th scope="col">Installment No.</th>
            <th scope="col">Installment Amount</th>
            <th scope="col">Total Fee</th>
            <th scope="col">Fees Paid</th>
            <th scope="col">Payment Due</th>
            <th scope="col">Amount</th>
            <th scope="col">Payment Date</th>
            <th scope="col">Total Fees Paid</th>
            <th scope="col">Balance</th>
            <th scope="col">Received By</th>
            <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($arr as $fee)
                <tr>
                    <th scope="row">{{ $fee["installment_no"] }}</th>
                    <td>{{ $fee["installment_amount"] }}</td>
                    <td>{{ $fee["total_fees"] }}</td>
                    <td>{{ $fee["fees_paid"] }}</td>
                    <td>{{ $fee["payment_due"] }}</td>
                    <td>{{ $fee["amount"] }}</td>
                    <td>{{ $fee["payment_date"] }}</td>
                    <td>{{ $fee["total_fee_paid"] }}</td>
                    <td>{{ $fee["balance"] }}</td>
                    <td>{{ $fee["received_by"] }}</td>
                    @if ($fee["amount"] != 0)
                        <td>Paid <br><a class="link" href="/students/{{ $fee["student_id"] }}/fee/{{ $fee["id"] }}/invoice">Print</a></td>
                    @else
                        <td><a class="link" href="/students/{{ $fee["student_id"] }}/fee/{{ $fee["id"] }}/pay">Pay</a></td>
                    @endif
                </tr>
            @endforeach
        </tbody>
        </table>
</div>
@endsection
