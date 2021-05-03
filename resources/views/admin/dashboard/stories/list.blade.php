@extends('admin.dashboard.home')

@section('dashboard')

@hasanyrole('writer|super-admin')
<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed navbar-ct-blue">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="pe-7s-paper-plane"></i> User Stories: Sprint {{$sprint_name}}</a>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="header">
                    <div class="row" >
                        <div class="col-md-12" align="center">
                            <h4> User Story Information </h4>
                        </div>
                        <div class="col-md-12" align="right">
                            <a class="btn btn-round btn-fill btn-primary" href="{{route('form_create_story', [$team->team_id, $team->project_id, $team->sprint_id ]) }}"> <i class="fa fa-plus-circle fa-lg"> </i> </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <table class="table">
                            <thead>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col"> Priority </th>
                                <th scope="col"> State </th>
                                <th scope="col"> Options </th>
                            </thead>
                            @php
                                $a = 1;
                            @endphp
                            <tbody>
                                @foreach($stories as $s)
                                <tr>
                                
                                    <td> {{$a}} </td>
                                    <td> {{ $s->story_name }} </td>
                                    <td> {{ $s->priority }}</td>
                                    
                                        @if($s->story_state == 'C')
                                            <td> To Do </td>
                                            <td>
                                                <a disabled class="btn btn-round btn-fill btn-warning" > <i class="fa fa-edit fa-lg"></i> </a>
                                                <a disabled class="btn btn-round btn-fill btn-info" > <i class="fa fa-eye fa-lg"></i> </a>
                                                <a disabled class="btn btn-round btn-fill btn-danger" > <i class="fa fa-trash fa-lg"></i> </a>
                                                <a class="btn btn-round btn-fill btn-success" href="{{route('start_story', $s->story_id)}}"> <i class="fa fa-play fa-lg"></i> </a>
                                            </td>
                                        @elseif($s->story_state == 'S')
                                            <td> In Progress </td>
                                            <td>
                                                <a class="btn btn-round btn-fill btn-warning"  disabled> <i class="fa fa-edit fa-lg"></i> </a>
                                                <a class="btn btn-round btn-fill btn-info"  > <i class="fa fa-eye fa-lg"></i> </a>
                                                <a class="btn btn-round btn-fill btn-danger"  disabled> <i class="fa fa-trash fa-lg"></i> </a>
                                                <a class="btn btn-round btn-fill btn-success" disabled> <i class="fa fa-play fa-lg"></i> </a>
                                            </td>
                                        @elseif($s->story_state == 'F')
                                            <td> Finished </td>
                                            <td>
                                                <a class="btn btn-round btn-fill btn-warning"  disabled> <i class="fa fa-edit fa-lg"></i> </a>
                                                <a class="btn btn-round btn-fill btn-info"  > <i class="fa fa-eye fa-lg"></i> </a>
                                                <a class="btn btn-round btn-fill btn-danger"  disabled> <i class="fa fa-trash fa-lg"></i> </a>
                                                <a class="btn btn-round btn-fill btn-success" disabled> <i class="fa fa-play fa-lg"></i> </a>
                                            </td>
                                        @endif
                                </tr>
                                    @php
                                        $a++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div align="center">
                    <div class="col-md-12">
                        <a class="btn btn-primary btn-fill" href="{{route('sprints', $team->project_id)}}"> <i class="fa fa-undo fa-lg"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>


                                        
@else

<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed navbar-ct-blue">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><i class="pe-7s-paper-plane"></i> User Stories: Sprint {{$sprint_name}}</a>
            </div>
        </div>
    </nav>
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="header">
                    <div class="row" >
                        <div class="col-md-12" align="center">
                            <h4> User Stories List </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div>
                        <table class="table">
                            <thead>
                                <th scope="col">ID</th>
                                <th scope="col">Name</th>
                                <th scope="col"> Priority </th>
                                <th scope="col"> Overall State </th>
                                <th scope="col"> Particular State </th>
                                <th scope="col"> Worked hours </th>
                                <th scope="col"> Options </th>
                            </thead>
                            @php
                                $a = 1;
                            @endphp
                            <tbody>
                                @foreach($stories as $s)
                                <tr>
                                
                                    <td> {{$a}} </td>
                                    <td> {{ $s->story_name }} </td>
                                    <td> {{ $s->priority }}</td>
                                    
                                    @if($s->story_state == 'C')
                                        <td> To Do </td>
                                        
                                    @elseif($s->story_state == 'S')
                                        <td> In Progress </td>
                                        
                                    @elseif($s->story_state == 'F')
                                        <td> Finished </td>
                
                                    @endif

                                    @if($s->uu_story_state == 0)
                                        @if($s->story_state == 'C')
                                            <td> To Do </td>
                                            <td> Pending </td>
                                            <td>
                                                <a class="btn btn-round btn-fill btn-success" disabled> <i class="fa fa-arrow-right fa-lg"></i> </a>
                                            </td>
                                        
                                        @elseif($s->story_state == 'S')
                                            <td> In Progress </td>
                                            <td> Pending </td>
                                            <td>
                                                <a class="btn btn-round btn-fill btn-success" href="{{route('task_story', $s->story_id)}}"> <i class="fa fa-arrow-right fa-lg"></i> </a>
                                            </td>
                                        @endif

                                    @elseif($s->uu_story_state == 1)
                                        <td> Finished </td>
                                        <td> {{$s->story_worked_hours}} </td>
                                        <td>
                                            <a class="btn btn-round btn-fill btn-success" disabled> <i class="fa fa-arrow-right fa-lg"></i> </a>
                                        </td>
                                    @endif
                                </tr>
                                    @php
                                        $a++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
                <div align="center">
                    <div class="col-md-12">
                        <a class="btn btn-primary btn-fill" href="{{route('sprints', $team->project_id)}}"> <i class="fa fa-undo fa-lg"></i> </a>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endhasanyrole
@stop