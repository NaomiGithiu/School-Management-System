<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>DarkPan</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="img/user.jpg" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">John Doe</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{route('dashboard.admin')}}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <div class="nav-item dropdown">
                
                @auth
                    @role('admin') 
                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="fa fa-laptop me-2"></i>Management</a>
                        <div class="dropdown-menu bg-transparent border-0">
                            <a href="{{url('students')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Manage Students</a>
                            <a href="{{url('teachers')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Manage Teachers</a>
                            <a href="{{url('attendance')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Attendance</a>
                            <a href="{{route('fees.index')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Fee</a>
                            <a href="{{route('classes.index')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Manage Classes</a>
                            <a href="{{route('subjects.index')}}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Manage Subjects</a>
                        </div>
                    @endrole
                {{-- <a href="{{Route('roles.index')}}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Manage Users</a>
                <a href="{{Route('roles.assign')}}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Manage Roles</a> --}}
            @endauth
            </div>
            
            @guest
            <a href="chart.html" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Charts</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Pages</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="404.html" class="dropdown-item">404 Error</a>
                    <a href="blank.html" class="dropdown-item">Blank Page</a>
                </div>
            @endguest
            
            </div>
        </div>
    </nav>
</div>