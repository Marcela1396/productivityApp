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
                    <a class="navbar-brand" href="#"> Create Rol </a>
                </div>
            </div>
        </nav>
        <div class="content">
        <form action="{{ route('update_role', $role->id )}}" method="POST">
        @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title"><i class="fa fa-star"></i>  &nbsp;Role Information</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-clipboard"></i> Name</label>                                             
                                                        <input type="text" class="form-control" placeholder="Rol Name" name="role_name" value="{{$role->name}}" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-newspaper-o"></i> Description</label>
                                                        <input type="text" class="form-control" placeholder="Description"  name="role_description" value="{{$role->description}}">
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