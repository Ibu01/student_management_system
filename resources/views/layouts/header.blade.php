<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->


    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="">
            <i class="fas fa-fw fa-home"></i>
            <span>Home</span>
        </a>

        <a class="nav-link collapsed" href="{{ route('student.index') }}">
            <i class="fas fa-fw fa-user"></i>
            <span>Student</span>
        </a>

        <a class="nav-link collapsed" href="{{ route('teacher.index') }}">
            <i class="fas fa-fw fa-users"></i>
            <span>Tacher</span>
        </a>

        <a class="nav-link collapsed" href="{{ route('course.index') }}">
            <i class="fas fa-fw fa-book"></i>
            <span>Courses</span>
        </a>

        <a class="nav-link collapsed" href="{{ route('batch.index') }}">
            <i class="fas fa-fw fa-envelope"></i>
            <span>Batches</span>
        </a>

        <a class="nav-link collapsed" href="{{ route('enrollment.index') }}">
            <i class="fas fa-fw fa-user-plus"></i>
            <span>Enrollment</span>
        </a>

        <a class="nav-link collapsed" href="{{ route('payment.index') }}">
            <i class="fas fa-fw fa-credit-card"></i>
            <span>Payment</span>
        </a>

    </li>


    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

    <!-- Sidebar Message -->

</ul>
