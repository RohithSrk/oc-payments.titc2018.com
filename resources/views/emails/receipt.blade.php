@extends('beautymail::templates.widgets')

@section('content')

    @include('beautymail::templates.widgets.articleStart',  ['color' => '#ffffff'])

    <h3 class="secondary" style="text-align: center"><strong>Payment Receipt</strong></h3>
    <p style="text-align: center"><b>Receipt ID: {{ $receiptId }}</b></p>
    <table style="width: 100%">
        <tr>
            <td><b>Name</b>: {{ $name }}</td>
            <td><b>Amount Paid</b>: {{ $amountPaid }}</td>
        </tr>
        <tr>
            <td><b>Country</b>: {{ $country }}</td>
            <td><b>Accommodation</b>: {{ $amountPaid == 2999 ? 'Yes' : 'No' }}</td>
        </tr>
        <tr>
            <td><b>Committee</b>: {{ $committee }}</td>
        </tr>
    </table>
    <br>
    <p>Regards,<br><b>Team TITC</b></p>

    @include('beautymail::templates.widgets.articleEnd')

@stop