@extends('backend.includes.main');
@section('content')

    
            <!-- Form Start -->
            <div class="container-fluid  px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class=" rounded h-100 p-4">
                            <h6 class="mb-4">Add New Reservation </h6>
                            <form method="POST" action="{{route('reservation.store')}}" enctype="multipart/form-data">
                                @csrf
                                {{-- <div class="mb-3">
                                    <label for="exampleInputEmail1"  class="form-label text-dark">Item Id</label>
                                    <input type="number"  class="form-control text-dark" name="id" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Customer Name</label>
                                    <input type="text" class="form-control text-dark" name="customer_name" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Phone</label>
                                    <input type="tel" class="form-control text-dark" name="phone" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Table Number</label>
                                    <input type="number" class="form-control text-dark" name="table_number" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Reservation Time</label>
                                    <input type="time" min="10:00" max="20:00" class="form-control text-dark" name="reservation_time" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Reservation Date</label>
                                    <input type="date" class="form-control text-dark" name="reservation_date" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Head Count</label>
                                    <input type="number" class="form-control text-dark" name="head_count" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Special Request</label>
                                    <textarea class="form-label text-dark" name="special_request" id="exampleInputEmail1" cols="55" rows="3" ></textarea>
                                    {{-- <input type="text" class="form-control text-dark" name="category" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required> --}}
                                </div>
                               
                                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
                           
                            </form>
                            <a href="{{route('reservation.index')}}">
                                <button class="btn btn-danger ">Cancel </button>
        
                            </a>
                            
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->

            
            

@endsection