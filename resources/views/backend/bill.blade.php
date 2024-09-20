@extends('backend.includes.main');
@section('content')

<div class="container-fluid  px-4">
    <div class="row g-4">
        
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Bill</h6>
                <div class="table-responsive">
                    <form action=""  >
                        <input type="search" placeholder="Search payments">
                        <button class="btn-dark">

                            <i class="p-1 fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Bill ID</th>
                                <th scope="col">Customer Name</th>
                                <th scope="col">Phone</th>
                                <th scope="col">Amount</th>
                                <th scope="col">Payment Method</th>
                                <th scope="col">Receipt</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bill as $bills )
                                
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$bills->customer_name}}</td>
                                <td>{{$bills->customer_phone}}</td>
                                <td>Rs.{{$bills->total_amount}}</td>
                                <td>{{$bills->payment_type}}</td>
                                <td>
                                    <a class="btn btn-sm btn-success" href="{{ route('receipt.download', $bills->id) }}"><i class="fa fa-receipt" aria-hidden="true"></i></a>
                                </td>
                            </tr>
                            @endforeach

                         </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
     
@endsection