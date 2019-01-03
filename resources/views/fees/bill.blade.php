<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Invoice</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
@php
    $response = getApiResponse('api/v1/students/'.$id.'/fee/'.$fid);
    $data = json_decode($response, true)[0];
    $response = getApiResponse('api/v1/students/'.$id);
    $student = json_decode($response, true);
    $response = getApiResponse('api/v1/courses/'.$student["course_id"]);
    $course = json_decode($response, true);
    $response = getApiResponse('api/v1/students/'.$id.'/fee');
    $arr = json_decode($response, true);
@endphp
<body class="p-5">
<div class="container">
    <div class="row">
        <div class="col-8">
            <h1 class="text-primary">Smart Computer Institute</h1>
            <span class="d-block text-dark">5, Laxmi Niwas Apt.,<br> Opp Bhujan Vikas Aghadi Office,<br> Babul Pada, Don Lane,<br> Achole Road, Nallasopara E - 401209</span>
            <span class="text-secondary d-block">mail@smartcomputerinsitute.org</span>
            <span class="text-secondary d-block">smartcomputerinsitute.org</span>
            <span class="text-dark d-block">+91 97631 24441</span>
        </div>
        <div class="col-4">
                <a href="/" class="link"><img src="{{ url('img/logo.png') }}" alt="" class="w-75"></a>
        </div>
    </div>
    <div class="row mt-3">&nbsp;</div>
    <div class="row mt-5">
        <div class="col">
            <h3 class="">Invoice To</h3>
        <span class="text-dark d-block">{{ $student["first_name"].' '.$student["middle_name"].' '.$student["last_name"]}}</span>
        <span class="text-dark d-block">{{ $course["name"] }}</span>
        <span class="text-dark d-block">{{ $student["email"] }}</span>
        <span class="text-dark d-block">{{ $student["phone"] }}</span>
        </div>
        <div class="col">
            <h3 class="">Invoice Details</h3>
            <span class="text-dark d-block">Invoice Id: {{ $data["id"] }}</span>
            <span class="text-dark d-block">Invoice Date: {{ date('d-m-Y',strtotime($data["payment_date"])) }}</span>
            <span class="text-dark d-block">Installment No: @if ($data["installment_no"] == 0)
                    {{ $data["installment_no"] }} (admission)
                @else
                {{ $data["installment_no"] }}
                @endif</span>
            <span class="text-dark d-block">Total Fee: &#8377;{{ $data["total_fees"] }}</span>
            <span class="text-dark d-block">Amount Paid: &#8377;{{ $data["amount"] }}</span>
            <span class="text-dark d-block">Balance: &#8377;{{ $data["balance"] }}</span>
            <span class="text-dark d-block">Payment Due: {{ date('d-m-Y',strtotime($data["payment_due"])) }}</span>
            <span class="text-dark d-block">Received By: {{ $data["received_by"] }}</span>
        </div>
    </div>
    <div class="row mt-3">&nbsp;</div>
    <div class="row mt-5">
        <h3>Payment Details</h3>
        <table class="table table-hover table-striped table-bordered mt-3">
            <thead>
                <tr>
                <th scope="col">Installment No.</th>
                <th scope="col">Payment Due</th>
                <th scope="col">Amount Paid</th>
                <th scope="col">Payment Date</th>
                <th scope="col">Balance</th>
                <th scope="col">Received By</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($arr as $fee)
                    <tr>
                        <th scope="row">
                            @if ($fee["installment_no"] == 0)
                                {{ $fee["installment_no"] }} (admission)
                            @else
                            {{ $fee["installment_no"] }}
                            @endif
                        </th>
                        <td>{{ date('d-m-Y',strtotime($fee["payment_due"])) }}</td>
                        <td>{{ $fee["amount"] }}</td>
                        <td>
                            @if ($fee["payment_date"])
                                {{ date('d-m-Y',strtotime($fee["payment_date"])) }}
                            @else
                                &nbsp;
                            @endif
                        </td>
                        <td>{{ $fee["balance"] }}</td>
                        <td>{{ $fee["received_by"] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="mt-3"></div>
    <hr>
    <div class="text-center">
        <p class="text-dark d-block">Terms and conditions</p>
    </div>
        <ul class="text-italic">
            <li>Fee should be paid on time if not then late fee will be charged.</li>
            <li>Once the fee is paid, it is not refundable nor transferable.</li>
        </ul>
</div>
<div class="mt-5"></div>
<div class="mt-5"></div>
<div class="container text-right mr-5 pr-5">Sign</div>
<div class="container text-right mr-0">Smart Computer Institute</div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>

</body>
</html>
