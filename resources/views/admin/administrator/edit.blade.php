@extends('backend.includes.main');
@section('content')

    
            <!-- Form Start -->
            <div class="container-fluid  px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class=" rounded h-100 p-4">
                            <h6 class="mb-4">Edit Administrator Details</h6>
                            <form action="{{route('administrator.update',$users->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" value="{{$users->name}}" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" value="{{$users->email}}" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div>
                                {{-- <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label" >Phone</label>
                                    <input type="tel" class="form-control" id="exampleInputPassword1" required>
                                </div> --}}
                                
                                
                                <button type="submit" class="btn btn-success">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->



@endsection