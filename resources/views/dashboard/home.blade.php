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
                
                <li>
                    <a href="{{route('sprints')}}">
                        <i class="pe-7s-news-paper"></i>
                        <p>Sprint</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('DoD')}}">
                        <i class="pe-7s-science"></i>
                        <p>Definition of Done</p>
                    </a>
                </li>
                <li>
                    <a href="{{route('allocate_team')}}">
                        <i class="pe-7s-user"></i>
                        <p> Allocate Teams</p>
                    </a>
                </li>

                <li>
                    <a href="{{route('members')}}">
                        <i class="pe-7s-bell"></i>
                        <p>Members</p>
                    </a>
                </li>

                <li>
                    <a href="{{route('capacity')}}">
                        <i class="pe-7s-map-marker"></i>
                        <p>Working capacity</p>
                    </a>
                </li>
				<li class="active-pro">
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >
                        <i class="pe-7s-
                        "></i><p>Logout</p>
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

</div>

</body>

</html>
