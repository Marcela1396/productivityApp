<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #880E4F;">

    <!-- Container wrapper -->
    <div class="container-fluid">
    <a href="{{ route('inicio') }}" class="text-light"> <i class="fas fa-plane-departure fa-white"></i> Travel Aventure </a>
    @if (Route::has('login'))
        <!-- Collapsible wrapper -->
        <div class="collapse navbar-collapse" id="navbarRightAlignExample">
            <!-- Left links -->
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
        @auth
        <!-- Aqui  van las opciones que el usuario observa cuando se autentica -->
            <li class="nav-item">
                <a href="{{ url('home') }}" class="btn btn-warning me-3 " > <i class="fas fa-home"></i>  Inicio </a>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                class="btn btn-danger me-3 " > <i class="fas fa-sign-out-alt"></i>  Salir </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </li>
    @else
        <!-- Opciones cuando el usuario no esta autenticado -->
            <li class="nav-item">
                <a href="{{ route('login') }}" class="btn btn-secondary me-3"> <i class="fas fa-user"></i> Iniciar Sesión</a>
            </li>
            @if (Route::has('register'))
            <li class="nav-item">
                <a href="{{ route('register') }}" class="btn btn-primary me-3" > <i class="fas fa-user-edit"></i> Registrarse </a>
            </li>
            @endif
            
        @endauth
        </ul>
    @endif
        </div>
  </div>
</nav>


           
            