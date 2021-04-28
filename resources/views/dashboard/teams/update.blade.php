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
                    <a class="navbar-brand" href="#"> Update Team </a>
                </div>
            </div>
        </nav>
        <div class="content">
        <form action="{{ route('update_team', $team->id)}}" method="POST">
        @csrf
            <div class="container-fluid">
                <div class="row">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title"><i class="fa fa-star"></i>  &nbsp;Team Information</h4>
                                        </div>
                                        <div class="content">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-users"></i> Name</label>                                                        
                                                        <input type="text" class="form-control" placeholder="Team Name" name="team_name" value="{{$team->name}}" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label><i class="fa fa-newspaper-o"></i> Description</label>
                                                        <input type="text" class="form-control" placeholder="Description"  name="team_description" value= "{{$team->description}}">
                                                    </div>
                                                </div>
                                            </div>
                            
                                        </div>
                                    </div>
                                </div>
                                    <div class="col-md-12">
                                        <div class="card">
                                            <div class="header">
                                                <h4 class="title"><i class="fa fa-users"></i>  &nbsp; Add Members to Team</h4>
                                            </div>
                                            <div class="content">
                                                <div class="row">
                                                    <div class="col-md-12">

                                                        @foreach($selected as $m)
                                                            <div class="checkbox">
                                                                <input id="{{'member_id_'.$m->id}}" type="checkbox" value="{{$m->id}}" name="{{'member_id_'.$m->id}}" checked  >
                                                                <label for="{{'member_id_'.$m->id}}"> {{ $m->name }}</label>
                                                            </div>
                                                        @endforeach 

                                                        @foreach($unselected as $m)
                                                            <div class="checkbox">
                                                                <input id="{{'member_id_'.$m->id}}" type="checkbox" value="{{$m->id}}" name="{{'member_id_'.$m->id}}" >
                                                                <label for="{{'member_id_'.$m->id}}"> {{ $m->name }}</label>
                                                            </div>
                                                        @endforeach 
            
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