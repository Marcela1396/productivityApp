@extends('dashboard.home')

@section('dashboard')


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
                    <a class="navbar-brand" href="#">User Stories</a>
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
                                                    <a class="btn btn-round btn-fill btn-warning" href="{{ route('update_sprint') }}"> <i class="fa fa-edit fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-info" href="{{ route('update_sprint') }}"> <i class="fa fa-eye fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-danger" href=""> <i class="fa fa-trash fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-success" href=""> <i class="fa fa-play fa-lg"></i> </a>
                                                </td>
                                            @elseif($s->story_state == 'S')
                                                <td> In Progress </td>
                                                <td>
                                                    <a class="btn btn-round btn-fill btn-warning" href="{{ route('update_sprint') }}" disabled> <i class="fa fa-edit fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-info" href="{{ route('update_sprint') }}" > <i class="fa fa-eye fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-danger" href="" disabled> <i class="fa fa-trash fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-success" href="" disabled> <i class="fa fa-play fa-lg"></i> </a>
                                                </td>
                                            @elseif($s->story_state == 'F')
                                                <td> Finished </td>
                                                <td>
                                                    <a class="btn btn-round btn-fill btn-warning" href="{{ route('update_sprint') }}" disabled> <i class="fa fa-edit fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-info" href="{{ route('update_sprint') }}" > <i class="fa fa-eye fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-danger" href="" disabled> <i class="fa fa-trash fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-success" href="" disabled> <i class="fa fa-play fa-lg"></i> </a>
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
                </div>
            </div>
        </div>  
</div>

@stop