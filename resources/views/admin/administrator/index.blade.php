    @extends('backend.includes.main');
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
                    <h6 class="mb-4">Administrator</h6>
                    
                    <div class="table-responsive">
                        <a href="{{route('administrator.create')}}">
                            <button class=" btn-success ">Add Administrator <i class="fa fa-plus"></i> </button>
    
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
                                @foreach ($users as $user)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>
                                            <a class="btn btn-sm btn-primary" href="{{ route('administrator.edit', $user->id) }}">Update</a>

                                            <!-- Role Change Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#changeRoleModal{{ $user->id }}">
                                                Change Role
                                            </button>

                                            <!-- Change Role Modal -->
                                            <div class="modal fade" id="changeRoleModal{{ $user->id }}" tabindex="-1" aria-labelledby="changeRoleModalLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="changeRoleModalLabel{{ $user->id }}">Change Role for {{ $user->name }}</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>

                                                        <!-- Single form to update role -->
                                                        <form action="{{ route('user.changeRole', $user->id) }}" method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            @method('PATCH')
                                                            <div class="modal-body">
                                                                <div class="form-group">
                                                                    <label for="role">Select Role</label>
                                                                    <select class="form-control" name="role" id="role">
                                                                        <option value="staff" {{ $user->role == 'staff' ? 'selected' : '' }}>Staff</option>
                                                                        <option value="customer" {{ $user->role == 'customer' ? 'selected' : '' }}>Customer</option>
                                                                        <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option>
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

                                            <!-- Delete Button trigger modal -->
                                            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $user->id }}">
                                                Delete
                                            </button>

                                            <!-- Delete Modal -->
                                            <div class="modal fade" id="deleteModal{{ $user->id }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $user->id }}" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="deleteModalLabel{{ $user->id }}">Delete User</h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Do you want to delete this user?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{ route('administrator.destroy', $user->id) }}" method="POST" enctype="multipart/form-data">
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
