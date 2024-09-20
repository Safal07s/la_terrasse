@extends('backend.includes.main');
@section('content')

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Reservations</h6>
                        <a href="">Show All</a>
                    </div>
                    <a href="{{route('reservation.create')}}">
                        <button class=" btn-success ">Add Reservation </button>

                    </a>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Reservation ID</th>
                                    <th scope="col">Cutomer Name</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Table Number</th>
                                    <th scope="col">Reservation Time</th>
                                    <th scope="col">Reservation Date</th>
                                    <th scope="col">Head Count </th>
                                    <th scope="col">Special Request</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation )
                                    
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$reservation->customer_name}}</td>
                                    <td>{{$reservation->phone}}</td>
                                    <td>{{$reservation->table_number}}</td>
                                    <td>{{$reservation->reservation_time}}</td>
                                    <td>{{$reservation->reservation_date}}</td>
                                    <td>{{$reservation->head_count}}</td>
                                    <td>{{$reservation->special_request}}</td>
                                    <td>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <i class="fa fa-trash "> </i>
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog        ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Reservation</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you want to delete this data?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{route('reservation.destroy', $reservation->id)}}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <a class="btn btn-sm btn-danger" href=""> <i class="fa fa-trash "></i> </a> --}}
                                    </td>
                                </tr>
                                @endforeach
                              
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->


      

@endsection

