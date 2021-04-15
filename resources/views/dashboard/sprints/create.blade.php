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
                    <a class="navbar-brand" href="#"> Create Sprint {{ $project }}</a>
                </div>
            </div>
        </nav>
        <div class="content">
        <form>
            <div class="container-fluid">
                <div class="row">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title">Sprint Information</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Sprint Name</label>
                                                        <input type="text" class="form-control" placeholder="Sprint Name" name="sprint_name" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Description</label>
                                                        <input type="text" class="form-control" placeholder="Description"  name="description_name">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Start Date </label>
                                                        <input type="date" class="form-control" placeholder="Start Date"  name="start_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Duration on Weeks </label>
                                                        <input type="number" class="form-control" placeholder="Duration"  name="duration">
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
                                            <h4 class="title"> Team Work </h4>
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
                                                                <th scope="col"> Assigned Hours For Weeks </th>
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
                                                                            <input type="hidden" name="id"  value="{{$m->member_id}}">
                                                                            <input type="text" class="form-control" placeholder="Hours"  name="assigned_hours">
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
                                                    <button type="submit" class="btn btn-info btn-fill pull-right" >Save</button>
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