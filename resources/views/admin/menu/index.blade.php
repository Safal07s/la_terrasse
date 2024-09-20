@extends('backend.includes.main');
@section('content')

            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Menu</h6>
                        <a href="">Show All</a>
                    </div>
                    <a href="{{route('menu.create')}}">
                        <button class=" btn-success ">Add Menu <i class="fa fa-plus"></i> </button>

                    </a>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Item ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Category</th>
                                    <th scope="col">Price</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($menus as $menu)
                                    
                                <tr>
                                    <td>{{ $loop->iteration}}</td>
                                    <td>{{$menu->name}}</td>
                                    <td>{{$menu->type}}</td>
                                    <td>{{$menu->category}}</td>
                                    <td>{{$menu->price}}</td>
                                    <td>{{$menu->description}}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{route('menu.edit', $menu->id)}}">Edit</a>
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                           Delete
                                        </button>
                                        
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog        ">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Delete Menu</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you Want to Delete This Menu?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <form action="{{route('menu.destroy', $menu->id)}}" method="POST" enctype="multipart/form-data" >
                                                            @csrf
                                                            @method('delete')
                                                            <button type="submit" name="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <a class="btn btn-sm btn-danger" href="{{route('menu.destroy', $menu->id)}}">Delete</a> --}}
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

