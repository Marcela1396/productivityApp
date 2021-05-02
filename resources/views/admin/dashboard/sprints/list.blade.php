@extends('admin.dashboard.home')

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
                    <a class="navbar-brand" href="#"> <i class="fa fa-calendar" aria-hidden="true"></i> Sprint </a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="header">
                        <div class="row" >
                            <div class="col-md-12" align="center">
                                <h4> Sprint Information </h4>
                            </div>
                            @hasanyrole('writer|super-admin')
                                @if(($quantity_actual < $record->sprint_quantity) )
                                    <div class="col-md-12" align="right">
                                        <a class="btn btn-round btn-fill btn-primary" href="{{ route('form_create_sprint', $project)}}"> <i class="fa fa-plus-circle fa-lg"> </i> </a>
                                    </div>
                                @else
                                    <div class="col-md-12" align="right">
                                        <a  disabled class="btn btn-round btn-fill btn-primary" href="{{ route('form_create_sprint', $project)}}" > <i class="fa fa-plus-circle fa-lg" > </i> </a>
                                    </div>
                                @endif
                            @endhasanyrole
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
                                    <th scope="col">Duration (Weeks) </th>
                                    <th scope="col"> Start Date </th>
                                    <th scope="col"> End Date </th>
                                    <th scope="col"> State </th>
                                    <th scope="col"> Options </th>
                                </thead>
                                @php
                                    $a = 1;
                                @endphp

                                <tbody>
                                    @foreach($sprints as $s)
                                    <tr>
                                    
                                        <td> {{$a}} </td>
                                        <td> {{ $s->sprint_name }} </td>
                                        <td> {{ $s->duration }}</td>
                                        <td> {{ $s->start_date }}</td>
                                        <td> {{ $s->end_date }}</td>
                                        @hasanyrole('writer|super-admin')
                                            @if($s->sprint_state == 'C')
                                                <td> Created </td>
                                                <td>
                                                    <a disabled class="btn btn-round btn-fill btn-warning" > <i class="fa fa-edit fa-lg"></i></a>
                                                    <a disabled class="btn btn-round btn-fill btn-info" > <i class="fa fa-eye fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-success" href="{{ route('stories', $s->sprint_id) }}"> <i class="fa fa-arrow-right fa-lg"></i></a>
                                                </td>
                                            @elseif($s->sprint_state == 'S')
                                                <td> In Progress </td>
                                                <td>
                                                    <a class="btn btn-round btn-fill btn-warning"  disabled> <i class="fa fa-edit fa-lg"></i></a>
                                                    <a class="btn btn-round btn-fill btn-info"  > <i class="fa fa-eye fa-lg "></i></a>
                                                    <a class="btn btn-round btn-fill btn-success" href="{{ route('stories', $s->sprint_id) }}"> <i class="fa fa-arrow-right fa-lg"></i></a>
                                                </td>
                                            @elseif($s->sprint_state == 'F')
                                                <td> Finished </td>
                                                <td>
                                                    <a class="btn btn-round btn-fill btn-warning"  disabled> <i class="fa fa-edit fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-info"  > <i class="fa fa-eye fa-lg"></i> </a>
                                                    <a class="btn btn-round btn-fill btn-success" href="{{ route('stories', $s->sprint_id)}}"> <i class="fa fa-arrow-right fa-lg"></i> </a>
                                                </td>
                                            @endif 
                                        @else
                                            @if($s->sprint_state == 'C')
                                                <td> Created </td>
                                            @elseif($s->sprint_state == 'S')
                                                <td> In Progress </td>
                                            @elseif($s->sprint_state == 'F')
                                                <td> Finished </td>
                                            @endif
                                            <td>
                                                <a class="btn btn-round btn-fill btn-success" href="{{ route('stories', $s->sprint_id) }}"> <i class="fa fa-arrow-right fa-lg"></i></a>
                                            </td>
                                        @endhasanyrole                                   
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
            <div align="center">
                <div class="col-md-12">
                    <a class="btn btn-primary btn-fill" href="{{route('projects')}}"> <i class="fa fa-undo fa-lg"></i> </a>
                </div>
            </div>
        </div>
</div>

@stop