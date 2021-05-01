@include('layouts.main2');  

<div class="wrapper">
    <div class="sidebar" data-color="blue" data-image="assets/img/team.jpeg">
    <!--
        Tip 1: you can change the color of the sidebar using: data-color="blue | azure | green | orange | red | purple"
        Tip 2: you can also add an image using data-image tag
    -->
    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="" class="simple-text">
                    Scrum Team Productivity
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="{{route('dashboard')}}">
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('projects')}}">
                        <i class="pe-7s-note2"></i>
                        <p>Projects</p>
                    </a>
                </li>

                @hasanyrole('writer|super-admin')
                <li>
                    <a href="{{route('capacity')}}">
                        <i class="pe-7s-graph2"></i>
                        <p> Working capacity </p>
                    </a>
                </li>

                <li>
                    <a href="{{route('teams')}}">
                        <i class="pe-7s-user"></i>
                        <p> Teams</p>
                    </a>
                </li>

                <li>
                    <a href="{{route('roles')}}">
                        <i class="pe-7s-way"></i>
                        <p> Roles </p>
                    </a>
                </li>

                <li>
                    <a href="{{route('users.index')}}">
                        <i class="pe-7s-users"></i>
                        <p> Users </p>
                    </a>
                </li>
                @endhasanyrole

				<li class="active-pro">
                    
                    <a href="{{route('about')}}">
                        <i class="fa fa-info-circle"></i>
                        <p> About us </p>
                    </a>
        
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out" aria-hidden="true"></i>
                        <p> Logout</p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                            @csrf
                    </form>
                </li>
            </ul>
    	</div>
    </div>

    <div>
       @yield('dashboard')         
    </div>


<script src="../../assets/js/eliminar.js"></script>
</body>

</html>
