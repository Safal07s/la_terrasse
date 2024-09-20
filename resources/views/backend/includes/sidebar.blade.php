<body>

    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->
    
        <!-- Sidebar Start -->
        <div class="sidebar pe-4 pb-3">
            <nav class="navbar bg-light navbar-light">
                <a href="{{url('/sa.index')}}" class="navbar-brand mx-4 mb-3">
                    <h3 class="text-primary"><i class=" me-2"></i>The Calm</h3>
                </a>
                <div class="d-flex align-items-center ms-4 mb-4">
                    <div class="position-relative">
                        <img class="rounded-circle" src="{{asset('backend_assets/img/user.png')}}" alt="" style="width: 40px; height: 40px;">
                        <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
                    </div>
                    <div class="ms-3">
                        <h6 class="mb-0">{{ Auth::user()->name }}</h6>
                        <span>{{ Auth::user()->role }}</span>
                    </div>
                </div>
                <div class="navbar-nav w-100">
                    <a href="{{url('/index')}}" class="nav-item nav-link active"><i class="fa fa-home me-2"></i>Home</a>
                    @if(Auth::check() && Auth::user()->role != 'staff')
                    <a href="{{url('/sa.index')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
                    @endif
                    <a href="{{url('/table')}}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Table</a>
    
                    <!-- Menu Section -->
                    <div class="nav-item dropdown">
                        <a href="{{url('/menu')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-utensils me-2"></i>Menu</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('menu.create')}}" class="dropdown-item">Add Menu</a>
                            <a href="{{route('menu.index')}}" class="dropdown-item">Manage Menu</a>
                        </div>
                    </div>
    
                    <!-- Reservation Section -->
                    <div class="nav-item dropdown">
                        <a href="{{url('/reservation')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-book me-2"></i>Reservation</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('reservation.create')}}" class="dropdown-item">Add Reservation</a>
                            <a href="{{route('reservation.index')}}" class="dropdown-item">Manage Reservation</a>
                        </div>
                    </div>
    
                    <a href="{{url('/bill')}}" class="nav-item nav-link"><i class="fa fa-receipt me-2"></i>Bill</a>
    
                    <!-- Admin Section (visible only to users who are not staff) -->
                    @if(Auth::check() && Auth::user()->role != 'staff')
                        <div class="nav-item dropdown">
                            <a href="{{url('/administrator')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user-tie me-2"></i>Admin</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="{{route('administrator.create')}}" class="dropdown-item">Add Admin</a>
                                <a href="{{route('administrator.index')}}" class="dropdown-item">Manage Admin</a>
                            </div>
                        </div>
                    @endif
    
                    <!-- Staff Section (visible only to users who are not staff) -->
                    @if(Auth::check() && Auth::user()->role != 'staff')
                        <div class="nav-item dropdown">
                            <a href="{{url('/staff')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Staff</a>
                            <div class="dropdown-menu bg-transparent border-0">
                                <a href="{{route('staff.create')}}" class="dropdown-item">Add Staff</a>
                                <a href="{{route('staff.index')}}" class="dropdown-item">Manage Staff</a>
                            </div>
                        </div>
                    @endif
    
                    <!-- Customer Section -->
                    <div class="nav-item dropdown">
                        <a href="{{url('/customer')}}" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-user me-2"></i>Customer</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{route('customer.create')}}" class="dropdown-item">Add Customer</a>
                            <a href="{{route('customer.index')}}" class="dropdown-item">Manage Customers</a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <!-- Sidebar End -->
    </div>
    </body>
    