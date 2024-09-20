@extends('backend.includes.main')

@section('content')
<div class="container">
    <!-- Customer Information -->
    {{-- <h2>Customer Information</h2>
    <form class="customer-form">
        <input type="text" placeholder="Enter Name" id="customer-name" required>
        <input type="text" placeholder="Enter Phone Number" id="customer-phone" required>
    </form> --}}

    <div class="row">
        <!-- Food & Drinks Section -->
        <div class="col-md-8">
            <h2>Food & Drinks</h2>
            <div class="form-inline">
                <input type="text" class="form-control" placeholder="Search Food & Drinks">
                <button type="button" class="btn btn-dark">Search</button>
                <button type="button" class="btn btn-secondary">Show All</button>
            </div>

            <table class="table-order table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Item Name</th>
                        <th>Type</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Add</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($menus as $menu)
                    <tr>
                        <td>{{ $menu->id }}</td>
                        <td>{{ $menu->name }}</td>
                        <td>{{ $menu->type }}</td>
                        <td>{{ $menu->category }}</td>
                        <td>Rs.{{ $menu->price }}</td>
                        <td>
                            <div class="input-group">
                                <input type="number" value="1" min="1" max="1000" class="quantity">
                                <form action="{{ route('cart.add', $menu->id) }}" method="POST">
                                    @csrf
                                    <button class="btn btn-primary">Add to Cart</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Cart Section -->
        <div class="col-md-4">
            <h2>Cart</h2>
            <table class="table-order table-bordered" id="cart-table">
                <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Action</th>
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
                        <td>
                            <form action="{{ route('cart.remove', $item['id']) }}" method="POST">
                                @csrf
                                <button class="btn btn-danger">Remove</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @php
    $cartTotal = 0;
    foreach ($cart as $item) {
        $cartTotal += $item['price'] * $item['quantity'];
    }
@endphp
            <p><strong>Cart Total:</strong> Rs. <span id="cart-total">{{ $cartTotal}}</span></p>
            <a href="{{url('/paybill')}}">

                <button class="btn btn-success btn-block mb-3 {{ count($cart) === 0 ? 'd-none' : '' }}" id="pay-bill">Pay Bill</button>
            </a>
            <form action="{{ route('cart.clear') }}" method="POST">
                @csrf
                <button class="btn btn-warning btn-block" id="new-customer">New Customer</button>
            </form>
        </div>
    </div>
</div>
@endsection
