@extends('backend.includes.main')

@section('content')
<div class="container-fluid px-4">
    <div class="row g-4">
        <div class="col-sm-12">
            <div class="rounded h-100 pt-0 p-4">
                <h1 class="mb-4">Pay Bill</h1>
                
                {{-- Show success message after bill payment --}}
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                        <div class="mt-3">
                            <button class="btn btn-primary" onclick="printReceipt()">Print</button>
                            <a href="{{ route('done') }}" class="btn btn-secondary">Done</a>
                        </div>
                    </div>
                @else
                    {{-- Form to display cart items and submit bill --}}
                    <form method="POST" action="{{ route('bill.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="cart-table">
                                <thead>
                                    <tr>
                                        <th>Item ID</th>
                                        <th>Item Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody id="cart-items">
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
                        </div>

                        <p><strong>Total Amount:</strong> Rs. <span id="cart-total">{{ $cartTotal }}</span></p>

                        <!-- Customer Information -->
                        <div class="container">
                            <h2>Customer Information</h2>
                            <div class="customer-form">
                                <div class="form-group mb-3">
                                    <label for="customer-name">Name</label>
                                    <input type="text" class="form-control" id="customer-name" name="customer_name" placeholder="Enter Name" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="customer-phone">Phone Number</label>
                                    <input type="text" class="form-control" id="customer-phone" name="customer_phone" placeholder="Enter Phone Number" required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="amount">Amount</label>
                                    <input type="number" class="form-control" id="amount" name="amount" value="{{ $cartTotal }}" readonly required>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="payment-type">Payment Type</label>
                                    <select class="form-control" id="payment-type" name="payment_type" required>
                                        <option value="Cash">Cash</option>
                                        <option value="Card">Card</option>
                                        <option value="Online">Online Payment</option>
                                    </select>
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-success btn-block mb-3" id="pay-bill">Pay Bill</button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
