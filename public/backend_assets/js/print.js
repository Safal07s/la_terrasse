function printReceipt() {
    var printWindow = window.open('', '', 'height=600,width=800');
    var printContent = `
        <html>
        <head>
            <title>Print Receipt</title>
            <link rel="stylesheet" href="{{ asset('css/print.css') }}" media="print">
        </head>
        <body>
            <h1>Receipt</h1>
            <table class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cart as $item)
                    <tr>
                        <td>{{ $item['id'] }}</td>
                        <td>{{ $item['name'] }}</td>
                        <td>Rs. {{ $item['price'] }}</td>
                        <td>{{ $item['quantity'] }}</td>
                        <td>Rs. {{ $item['price'] * $item['quantity'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <p><strong>Total Amount:</strong> Rs. {{ $cartTotal }}</p>
        </body>
        </html>
    `;

    printWindow.document.open();
    printWindow.document.write(printContent);
    printWindow.document.close();
    printWindow.print();
}
