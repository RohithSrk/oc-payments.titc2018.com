<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>TITC Payment Receipt</title>
    <style>
        body {
            font-family: "sans-serif";
        }
        table {
            border-collapse: collapse;
            width: 100%;
        }

        table td {
            padding: 5px;
            border: 2px solid #cccccc;
        }

        table tr {
            border: none;
        }

        .header {
            position: relative;
            width: 100%;
            height: 170px;
        }

        .header img {
            position: absolute;
            left: 10px;
            top: 20px;
        }

        .header h1 {
            position: absolute;
            text-align: center;
            top: 30px;
            left: 160px;
            font-weight: 200;
            letter-spacing: 2px;
        }

        .receipt-info {
            position: relative;
            text-align: right;
            margin-bottom: 20px;
        }

        .date {
            margin-bottom: 5px;
        }

        .receipt-info h2 {
            position: absolute;
            top: 5px;
            left: 0;
            font-weight: normal;
        }
    </style>
</head>
<body>

    <div class="header">
        <img src="{{\URL::to('/') . '/img/'}}titc-logo.png" alt="TITC Logo" width="140">
        <h1>THE INTERNATIONAL <br>THEMATIC CONFERENCE 2018</h1>
    </div>

    <div class="receipt-info">
        <h2>Payment Receipt</h2>
        <div class="date">Date: {{ date('F j, Y') }}</div>
        <div class="receipt-num">Receipt #: {{ $receiptId }}</div>
    </div>

    <table>
        <tr>
            <td><b>Name</b>: {{ $name }}</td>
            <td><b>Receipt No.:</b> {{ $receiptId }} </td>
        </tr>
        <tr>
            <td><b>Country</b>: {{ $country }}</td>
            <td><b>Amount Paid</b>: {{ $amountPaid }}</td>
        </tr>
        <tr>
            <td><b>Committee</b>: {{ $committee }}</td>
            <td><b>Accommodation</b>: {{ $amountPaid == 2999 ? 'Yes' : 'No' }}</td>
        </tr>
    </table>

</body>
</html>