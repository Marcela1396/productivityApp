<!-- Navbar-->
<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #880E4F;">
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
            <!-- Aqui  van las opciones que el usuario observa cuando se autentica -->
            <li class="nav-item me-3 me-lg-1">
                <a href="{{ url('home') }}" class="btn btn-warning me-3 " > <i class="fas fa-home"></i>  Home </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-danger me-3 " > <i class="fas fa-sign-out-alt"></i>  Logout </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
    @else

            <li class="nav-item me-3 me-lg-1">
                <a href="{{ route('login') }}" class="btn btn-primary me-1" > <i class="fas fa-user"></i> Login </a>
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

           
            
            