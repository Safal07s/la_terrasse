@extends('backend.includes.main')
@section('content')
@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    <script>
        setTimeout(function(){
            window.location.href = "{{ url()->current() }}";
        }, 2000); // 2000 milliseconds = 2 seconds
    </script>
@endif

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">

        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Customer</h6>
                <div class="table-responsive">
                    <a href="{{route('customer.create')}}">
                        <button class=" btn-success ">Add Customer <i class="fa fa-plus"></i> </button>
                    </a>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($customers as $customer)
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $customer->name }}</td>
                                    <td>{{ $customer->email }}</td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('customer.edit', $customer->id) }}">Update</a>

                                        <!-- Check if user is admin before showing Change Role button -->
                                        @if (Auth::check() && Auth::user()->role == 'admin')
                                            <!-- Role Change Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#changeRoleModal{{ $customer->id }}">
                                                Change Role
                                            </button>

                                            <!-- Change Role Modal -->
                                            <div class="modal fade" id="changeRoleModal{{ $customer->id }}" tabindex="-1" aria-labelledby="changeRoleModalLabel{{ $customer->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="changeRoleModalLabel{{ $customer->id }}">Change Role for {{ $customer->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <!-- Single form to update role -->
                                                        <form action="{{ route('user.changeRole', $customer->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="role">Select Role</label>
                                                                    <select class="form-control" name="role" id="role">
                                                                        <option value="staff" {{ $customer->role == 'staff' ? 'selected' : '' }}>Staff</option>
                                                                        <option value="customer" {{ $customer->role == 'customer' ? 'selected' : '' }}>Customer</option>
                                                                        <option value="admin" {{ $customer->role == 'admin' ? 'selected' : '' }}>Admin</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                                <button type="submit" class="btn btn-warning">Update Role</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Delete Button trigger modal (this can be accessible to other roles as per your preference) -->
                                        <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $customer->id }}">
                                            Delete
                                        </button>

                                        <!-- Delete Modal -->
                                        <div class="modal fade" id="deleteModal{{ $customer->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $customer->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="deleteModalLabel{{ $customer->id }}">Delete User</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Do you want to delete this user?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <form action="{{ route('user.destroy', $customer->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
