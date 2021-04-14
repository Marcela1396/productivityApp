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
                    <a class="navbar-brand" href="#">Projects</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                
                <div class="row">
                    <div class="header">
                        <div class="row" >
                            <div class="col-md-12" align="center">
                                <h4> Project Information </h4>
                            </div>
                            <div class="col-md-12" align="right">
                                <a class="btn btn-round btn-fill btn-primary"> Create </a>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <table class="table">
                            <thead>
                                <th scope="col"> ID</th>
                                <th scope="col"> Name</th>
                                <th scope="col"> Start Date </th>
                                <th scope="col"> End Date </th>
                                <th scope="col"> Sprint Quantity</th>
                                <th scope="col"> Team </th>
                                <th scope="col"> State</th>
                                <th scope="col"> Options </th>
                            </thead>
                            @php
                                $a = 1;
                            @endphp

                            <tbody>
                                @foreach($projects as $it)
                                <tr>
                                    <td> {{ $a}} </td>
                                    <td> {{ $it->name }} </td>
                                    <td> {{ $it->start_date }} </td>
                                    <td> {{ $it->end_date }} </td>
                                    <td> {{ $it->sprint_quantity }}</td>
                                    <td> {{ $it->team_name }}</td>
                                    @if($it->state == 'C')
                                        <td> Created </td>  
                                        <form action="{{ route('update_project') }}" method="POST">
                                            @csrf
                                                <td>
                                                    <input type="hidden" id='project' name='project_id' value="{{$it->id}}">
                                                    <button type="submit" class="btn btn-round btn-fill btn-warning"> Edit </button>
                                                    <a class="btn btn-round btn-fill btn-info" > View </a>
                                                    <a class="btn btn-round btn-fill btn-success" href="{{ route('sprints', $it->id)}}"> Enter </a>
                                                </td>
                                        </form>
                                    @elseif($it->state == 'S')
                                        <td> In Progress </td>
                                        <td>
                                            <button type="submit" class="btn btn-round btn-fill btn-warning" disabled> Edit </button>
                                            <a class="btn btn-round btn-fill btn-info"> View </a>
                                            <a class="btn btn-round btn-fill btn-success" href="{{ route('sprints') }}"> Enter </a>
                                        </td>
                                       
                                    @elseif($it->state == 'F')
                                        <td> Finished </td>
                                        <td>
                                            <button type="submit" class="btn btn-round btn-fill btn-warning" disabled> Edit </button>
                                            <a class="btn btn-round btn-fill btn-info"> View </a>
                                            <a class="btn btn-round btn-fill btn-success" disabled> Enter </a>
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

@stop