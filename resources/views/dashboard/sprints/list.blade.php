@extends('dashboard.home')

@section('dashboard')


<div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Sprint</a>
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
                            <div class="col-md-12" align="right">
                                <a class="btn btn-round btn-fill btn-primary" href="{{ route('create_sprint') }}"> Create </a>
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
                                            @if($s->sprint_state == 'C')
                                                <td> Created </td>
                                                <td>
                                                    <a class="btn btn-round btn-fill btn-warning" href="{{ route('update_sprint') }}"> Edit </a>
                                                    <a class="btn btn-round btn-fill btn-info" href="{{ route('update_sprint') }}"> View </a>
                                                    <a class="btn btn-round btn-fill btn-success" href="{{ route('stories', $s->sprint_id) }}"> Enter </a>
                                                </td>
                                            @elseif($s->sprint_state == 'S')
                                                <td> In Progress </td>
                                                <td>
                                                    <a class="btn btn-round btn-fill btn-warning" href="{{ route('update_sprint') }}" disabled> Edit </a>
                                                    <a class="btn btn-round btn-fill btn-info" href="{{ route('update_sprint') }}" > View </a>
                                                    <a class="btn btn-round btn-fill btn-success" href="{{ route('stories', $s->sprint_id) }}"> Enter </a>
                                                </td>
                                            @elseif($s->sprint_state == 'F')
                                                <td> Finished </td>
                                                <td>
                                                    <a class="btn btn-round btn-fill btn-warning" href="{{ route('update_sprint') }}" disabled> Edit </a>
                                                    <a class="btn btn-round btn-fill btn-info" href="{{ route('update_sprint') }}" > View </a>
                                                    <a class="btn btn-round btn-fill btn-success" href="{{ route('stories', $s->sprint_id)}}"> Enter </a>
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
            <div class="row" >
                <div class="col-md-12" align="center">
                    <a class="btn btn-fill btn-primary" href="{{ route('projects')}}"> Back </a>
                </div>
            </div>
        </div>
</div>

@stop