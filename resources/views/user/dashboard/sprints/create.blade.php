@extends('admin.dashboard.home')

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
                    <a class="navbar-brand" href="#"> Create Sprint </a>
                </div>
            </div>
        </nav>
        <div class="content">
        <form action="{{ route('register_sprint')}}" method="POST">
        @csrf 
            <div class="container-fluid">
                <div class="row">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title"><i class="fa fa-star"></i>  &nbsp;Sprint Information</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-clipboard"></i> Name</label>
                                                        <input type="hidden" value="{{$project}}"  name="project">
                                                        <input type="text" class="form-control" placeholder="Sprint Name" name="sprint_name" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-newspaper-o"></i> Description</label>
                                                        <input type="text" class="form-control" placeholder="Description"  name="sprint_description">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-calendar"></i> Start Date </label>
                                                        <input type="date" class="form-control" placeholder="Start Date"  name="sprint_start_date" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-clock-o"></i> Duration on Weeks </label>
                                                        <input disabled type="number" class="form-control" placeholder="Duration"  name="sprint_duration" value={{$size}} required>
                                                        <input type="hidden" class="form-control" placeholder="Duration"  name="sprint_duration" value={{$size}} required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="clearfix"></div> 
                                        </div>
                                    </div>
                                </div>

                                

                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title"> <i class="fa fa-users"></i>  &nbsp; Team Work </h4>
                                        </div>
                                        <div class="content">
                                            
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div>
                                                        <table class="table">
                                                            <thead>
                                                                <th scope="col"> ID</th>
                                                                <th scope="col"> Member Name</th>
                                                                <th scope="col"> Role </th>
                                                                <th scope="col"> Assigned Hours For Week </th>
                                                            </thead>
                                                            @php
                                                                $a = 1;
                                                            @endphp
                                                            <tbody>
                                                            @foreach($members as $m)
                                                                <tr>     
                                                                    <td> {{$a}} </td>
                                                                    <td> {{ $m->member_name }} </td>
                                                                    <td> {{ $m->role_name }} </td>
                                                                    <td>
                                                                        <div class="form-group">
                                                                          
                                                                            <input type="hidden" name="{{'member_'.$m->member_id}}"  value="{{$m->member_id}}">
                                                                            <input type="number" min='1' class="form-control" placeholder="Hours"  name="{{'assigned_hours_'.$m->member_id}}" required>
                                                                        </div>
                                                                    </td>
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
                                      
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success btn-fill pull-right" ><i class="fa fa-save"></i> Save</button>
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
        </form>
    </div>
</div>

@stop