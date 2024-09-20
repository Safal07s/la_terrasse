@extends('backend.includes.main')
@section('content')

    <!-- Form Start -->
    <div class="container-fluid  px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-6">
                <div class="rounded h-100 p-4">
                    <h6 class="mb-4">Create New Staff</h6>
                    <form action="{{route('staff.store')}} " method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="name" id="name"
                                aria-describedby="nameHelp" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email"
                                aria-describedby="emailHelp" required>
                            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
                        </div>

                        <!-- Dropdown for Role -->
                        <div class="mb-3">
                            <label for="role" class="form-label">Role</label>
                            <select class="form-select" name="role" id="role" required>
                                <option value="customer">Customer</option>
                                <option value="staff">Staff</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Form End -->

@endsection
