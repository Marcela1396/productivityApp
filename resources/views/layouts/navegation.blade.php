<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #1565C0;">
    <div class="container-fluid justify-content-between">
       <!-- Left elements -->
        <div class="d-flex">
            <!-- Brand -->
            <a href="{{ route('inicio') }}" class="text-light"> <i class="fas fa-users fa-white"></i> Scrum Team Productivity </a>
        </div>
    <!-- Left elements -->
    @if (Route::has('login'))
        <!-- Right elements -->
        <ul class="navbar-nav flex-row">

        @auth
            @include('dashboard.home');
    @else

            <li class="nav-item me-3 me-lg-1">
                <a href="{{ route('login') }}" class="btn btn-info me-3" > <i class="fas fa-user"></i> Login </a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item me-3 me-lg-1">
                    <a href="{{ route('register') }}" class="btn btn-success me-1"  > <i class="fas fa-user-edit"></i> Register </a>
                </li>
            @endif
        @endauth 
        </ul>
    @endif
        <!-- Right elements -->
    </div>
</nav>
<!-- Navbar -->

           
            
            