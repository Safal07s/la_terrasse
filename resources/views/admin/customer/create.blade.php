@extends('backend.includes.main');
@section('content')

    
            <!-- Form Start -->
            <div class="container-fluid  px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class=" rounded h-100 p-4">
                            <h6 class="mb-4">Create New Customer</h6>
                            <form action="{{route('user.store')}} " method="POST" enctype="multipart/form-data" >
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Email address</label>
                                    <input type="email" class="form-control" name="email" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div>
                                </div>
                                
                                <div class="mb-3">
                                    <label for="exampleInputPassword1" class="form-label">Password</label>
                                    <input type="password" class="form-control" name="password" id="exampleInputPassword1" required>
                                </div>
                                
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->



@endsection