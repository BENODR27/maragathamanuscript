<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
           <img src="{{asset('img/mm/logo.png')}}" alt="logo" width="50">
        </div>
        <div class="sidebar-brand-text mx-3"><sup></sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    @if(Auth::user()->role=="developer")
    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="/dashboard">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
   @endif
   <li class="nav-item">
    <a class="nav-link" href="{{route('user.browse')}}">
        <i class="fas fa-fw fa-solid fa-user"></i>
        <span>Users</span></a>
   </li>

   <li class="nav-item">
    <a class="nav-link" href="{{route('order.browse',['filter'=>'new'])}}">
        <i class="fas fa-fw fa-solid fa-building"></i>
        <span>Orders</span></a>
   </li>
   <li class="nav-item">
    <a class="nav-link" href="{{route('category.browse')}}">
        <i class="fas fa-fw fa-solid fa-building"></i>
        <span>Categories</span></a>
   </li>
   {{-- <li class="nav-item">
    <a class="nav-link" href="{{route('segment.browse')}}">
        <i class="fas fa-fw fa-solid fa-network-wired"></i>
        <span>Segments</span></a>
    </li> --}}
   
   
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('genre.browse')}}">
            <i class="fas fa-fw fa-solid fa-envelope-open"></i>
            <span>Genres</span></a>
    </li> --}}
   
  
    <li class="nav-item">
        <a class="nav-link" href="{{route('department.browse')}}">
            <i class="fas fa-fw fa-solid fa-industry"></i>
            <span>Departments</span></a>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link" href="{{route('product.browse')}}">
            <i class="fas fa-fw fa-solid fa-sitemap"></i>
            <span>All Products</span></a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link" href="{{route('submission.browse',['filter'=>'pending'])}}">
            <i class="fas fa-fw fa-regular fa-address-card"></i>
            <span>Submissions</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('appointment.browse',['filter'=>'pending'])}}">
            <i class="fas fa-fw fa-solid fa-paste"></i>
            <span>Appointments</span></a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{route('view.custom.notification')}}">
            <i class="fas fa-fw fa-solid fa-bell"></i>
            <span>Send Notification</span></a>
       </li>
    <!-- Divider -->
    <hr class="sidebar-divider">
@if(Auth::user()->role=="developer")
    <!-- Heading -->
    <div class="sidebar-heading">
        Interface
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
            aria-expanded="true" aria-controls="collapseTwo">
            <i class="fas fa-fw fa-cog"></i>
            <span>Components</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Components:</h6>
                <a class="collapse-item" href="buttons.html">Buttons</a>
                <a class="collapse-item" href="cards.html">Cards</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
            aria-expanded="true" aria-controls="collapseUtilities">
            <i class="fas fa-fw fa-wrench"></i>
            <span>Utilities</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
            data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Custom Utilities:</h6>
                <a class="collapse-item" href="utilities-color.html">Colors</a>
                <a class="collapse-item" href="utilities-border.html">Borders</a>
                <a class="collapse-item" href="utilities-animation.html">Animations</a>
                <a class="collapse-item" href="utilities-other.html">Other</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Addons
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
            aria-expanded="true" aria-controls="collapsePages">
            <i class="fas fa-fw fa-folder"></i>
            <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Login Screens:</h6>
                <a class="collapse-item" href="login.html">Login</a>
                <a class="collapse-item" href="register.html">Register</a>
                <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
                <div class="collapse-divider"></div>
                <h6 class="collapse-header">Other Pages:</h6>
                <a class="collapse-item" href="404.html">404 Page</a>
                <a class="collapse-item" href="blank.html">Blank Page</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Charts -->
    <li class="nav-item">
        <a class="nav-link" href="charts.html">
            <i class="fas fa-fw fa-chart-area"></i>
            <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider d-none d-md-block">
@endif
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

  

</ul>
<!-- End of Sidebar -->