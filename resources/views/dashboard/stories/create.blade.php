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
                    <a class="navbar-brand" href="#">Create User Story</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="content">
                    <div class="container-fluid">
                    <form action="{{ route('register_story')}}" method="POST" >
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"><i class="fa fa-star"></i>  &nbsp; User Story Information </h4> 
                                    </div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-clipboard"></i> User Story Name</label>
                                                    <input type="text" class="form-control" placeholder="Name" name="story_name" required>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label><i class="fa fa-arrow-up"></i> Priority</label>
                                                     <input type="number" min="1" max="5" class="form-control" placeholder="Priority" name="story_priority" required>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label><i class="fa fa-newspaper-o"></i> Description</label>
                                                    <input type="text" class="form-control" placeholder="Description" name="story_description">
                                                    <input type="hidden"  name="sprint" value="{{$sprint}}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"> <i class="fa fa-tasks"></i> &nbsp;Task Information   </h4>
                                    </div>

                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <legend>
                                                    <div class="form-group">
                                                        <h5> <i class="fa fa-users"></i> <b> Team : </b> {{$team->name}} </h5>
                                                    </div>
                                                </legend>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div>
                                                    <table class="table">
                                                        <thead>
                                                            <th scope="col"> ID</th>
                                                            <th scope="col"> Name</th>
                                                            <th scope="col"> Description </th>
                                                            <th scope="col"> Member </th>
                                                        </thead>
                                                        @php
                                                            $a = 1;
                                                        @endphp
                                                        <tbody>
                                                            @foreach($done as $d)
                                                            <tr>
                                                            
                                                                <td> {{$a}} </td>
                                                                <td> {{ $d->dod_name }} </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="hidden" name="project_id"  value="{{$d->project_id}}">
                                                                        <input type="hidden" name="{{'dod_id_'.$d->dod_id}}"  value="{{$d->dod_id}}">
                                                                        <input type="text" class="form-control" placeholder="Description"  name="{{'task_description_'.$d->dod_id}}">
                                                                    </div>
                                                                </td>
                                                                <td> 
                                                                    <select name="{{'member_id_'.$d->dod_id}}"  id="members" class="form-control" >
                                                                        <option disabled selected > Select Option </option>
                                                                        @foreach($members as $m)
                                                                            <option value="{{$m->member_id}}" required > {{ $m->member_name }} : {{ $m->role_name }} </option>
                                                                        @endforeach
                                                                    </select>
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
                                                <button type="submit" class="btn btn-success btn-fill pull-right" ><i class="fa fa-save"></i> Save </button>
                                                <div class="clearfix"></div>
                                            </div>
                                        </div>        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>  
    </div>
</div>

@stop

