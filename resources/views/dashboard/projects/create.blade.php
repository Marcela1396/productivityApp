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
                    <a class="navbar-brand" href="#"> Create Project </a>
                </div>
            </div>
        </nav>
        <div class="content">
        <form action="{{ route('register_project')}}" method="POST">
        @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title"><i class="fa fa-star"></i>  &nbsp;Project Information</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> <i class="fa fa-clipboard"></i> Name</label>
                                                        <input type="text" class="form-control" placeholder="Project Name" name="project_name" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-newspaper-o"></i> Description</label>
                                                        <input type="text" class="form-control" placeholder="Description"  name="project_description">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-calendar"></i> Start Date </label>
                                                        <input type="date" class="form-control" placeholder="Start Date"  name="project_start_date">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-clock-o"></i> Duration on Weeks </label>
                                                        <input type="number" class="form-control" placeholder="Duration"  name="project_duration">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-sort-amount-desc"></i> Sprint Quantity </label> 
                                                        <input type="number" class="form-control" placeholder="Sprint Quantity"  name="sprint_quantity">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label> <i class="fa fa-users"></i> Select Team </label> <br>
                                                        <select name="team_id"  id="team_id" class="form-control">
                                                            <option disabled selected > Select Option </option>
                                                            @foreach($team as $t)
                                                                <option value="{{$t->id}}" > {{$t->name}} </option>
                                                            @endforeach
                                                        </select>
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
                                            <h4 class="title"><i class="fa fa-list"></i>  &nbsp;Definition of Done </h4>
                                        </div>
                                        <div class="content">
                                            
                                            <div class="row">
                                                <div class="col-md-10">
                                                    <div class="form-group">
                                                        <label> Name </label>
                                                        <input type="text" class="form-control" placeholder="Critery Name"  name="name">
                                                    </div>
                                                </div>         
                                                <div class="col-md-2">
                                                    <label>. </label> <br>
                                                    <a href="" class="btn btn-primary btn-fill" >
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                    <a href="" class="btn btn-danger btn-fill" >
                                                        <i class="fa fa-trash"></i>
                                                    </a>
                                                </div>      
                                             </div>
                                      
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <button type="submit" class="btn btn-success btn-fill pull-right" >
                                                        <i class="fa fa-save"></i> Save
                                                    </button>
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