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
                    <div class="col-md-10">
                        <h4 class="title">Allocate Sprint to Project</h4>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-round btn-fill btn-warning" href="{{ route('start_project') }}"> Create </a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table class="table">
                                <thead>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Duration </th>
                                    <th scope="col"> Start Date </th>
                                    <th scope="col"> End Date </th>
                                    <th scope="col"> State </th>
                                    <th scope="col"> Options </th>
                                </thead>

                                <tbody>
                                    @foreach($sprints as $s)
                                    <tr>
                                    
                                        <td> {{ $s->id }} </td>
                                        <td> {{ $s->name }} </td>
                                        <td> {{ $s->description }}</td>
                                        <td> {{ $s->duration }}</td>
                                        <td> {{ $s->start_date }}</td>
                                        <td> {{ $s->end_date }}</td>
                                            @if($s->state == 'C')
                                                <td> Created </td>
                                            @elseif($s->state == 'S')
                                                <td> In Progress </td>
                                            @elseif($s->state == 'F')
                                                <td> Finished </td>
                                            @endif

                                        <td>
                                            <a class="btn btn-round btn-fill btn-info" href="{{ route('start_project') }}"> Edit </a>
                                            <a class="btn btn-round btn-fill btn-success" href="{{ route('start_project') }}"> Start </a>
                                        </td>
                                        
                                    </tr>
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