@extends('backend.includes.main');
@section('content')

    
            <!-- Form Start -->
            <div class="container-fluid  px-4">
                <div class="row g-4">
                    <div class="col-sm-12 col-xl-6">
                        <div class=" rounded h-100 p-4">
                            <h6 class="mb-4">Update Item </h6>
                            <form method="POST" action="{{route('menu.update', $menus->id)}}" enctype="multipart/form-data">
                                @csrf
                                @method('put')
                                {{-- <div class="mb-3">
                                    <label for="exampleInputEmail1"  class="form-label text-dark">Item Id</label>
                                    <input type="number"  class="form-control text-dark" name="id" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" required>
                                </div> --}}
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Name</label>
                                    <input type="text" class="form-control text-dark" name="name" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$menus->name}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Type</label>
                                    <input type="text" class="form-control text-dark" name="type" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$menus->type}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Category</label>
                                    <input type="text" class="form-control text-dark" name="category" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$menus->category}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Price</label>
                                    <input type="number" class="form-control text-dark" name="price" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$menus->price}}" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label text-dark">Description</label>
                                    <input type="text" class="form-control text-dark" name="description" id="exampleInputEmail1"
                                        aria-describedby="emailHelp" value="{{$menus->description}}" required>
                                </div>
                                <button type="submit" class="btn btn-success" name="submit">Update</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Form End -->



@endsection