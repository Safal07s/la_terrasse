<!DOCTYPE html>
<html>
<head>
    <title>Receipt</title>
    <style>
        /* Add some basic styles for the receipt */
        body {
            font-family: Arial, sans-serif;
        }
        .receipt {
            border: 1px solid #000;
            padding: 20px;
            width: 80%;
            margin: auto;
        }
        .receipt h1 {
            text-align: center;
        }
        .receipt table {
            width: 100%;
            border-collapse: collapse;
        }
        .receipt th, .receipt td {
            border: 1px solid #000;
            padding: 10px;
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="receipt">
        <h1>Receipt</h1>
        <p><strong>Bill ID:</strong> {{ $bill->id }}</p>
        <p><strong>Customer Name:</strong> {{ $bill->customer_name }}</p>
        <p><strong>Phone:</strong> {{ $bill->customer_phone }}</p>
        <p><strong>Amount:</strong> Rs. {{ $bill->total_amount }}</p>
        <p><strong>Payment Method:</strong> {{ $bill->payment_type }}</p>
        <p><strong>Date:</strong> {{ $bill->created_at->format('d-m-Y H:i:s') }}</p>
    </div>
</body>
</html>
