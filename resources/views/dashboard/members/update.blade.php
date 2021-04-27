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
                    <a class="navbar-brand" href="#"> Update Member </a>
                </div>
            </div>
        </nav>
        <div class="content">
        <form action="{{ route('update_member', $member->id)}}" method="POST">
        @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title"><i class="fa fa-star"></i>  &nbsp;Member Information</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-newspaper-o"></i> Card ID </label>
                                                        <input type="text" class="form-control" placeholder="Card ID"  name="member_id" value="{{$member->id_number}}">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-clipboard"></i> Name</label>                                                        
                                                        <input type="text" class="form-control" placeholder="Member Name" name="member_name" value="{{$member->name}}">
                                                    </div>
                                                </div>
                                                
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-envelope"></i> Email </label>                                                        
                                                        <input type="email" class="form-control" placeholder="Email" name="member_email" value="{{$member->email}}">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-user"></i> Speciality</label>
                                                        <input type="text" class="form-control" placeholder="Speciality"  name="member_speciality" value="{{$member->speciality}}">
                                                    </div>
                                                </div>       
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-key"></i> Password </label>                                                        
                                                        <input type="password" class="form-control" placeholder="Password" name="member_password" required>
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