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
                    <form>
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="header">
                                        <h4 class="title"> User Story Information </h4> 
                                    </div>
                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>User Story Name</label>
                                                    <input type="text" class="form-control" placeholder="Name" name="story_name">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>Priority</label>
                                                     <input type="number" min="1" max="5" class="form-control" placeholder="Priority" name="story_priority">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label>Description</label>
                                                    <input type="text" class="form-control" placeholder="Description" name="story_description">
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
                                        <h4 class="title"> Task Information </h4>
                                    </div>

                                    <div class="content">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <legend>
                                                    <div class="form-group">
                                                        <h5> <b> Team Name : </b> {{$team->name}} </h5>
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
                                                            <th scope="col"> Member </th>
                                                            <th scope="col"> Assigned Hours </th>
                                                        </thead>
                                                        @php
                                                            $a = 1;
                                                        @endphp
                                                        <tbody>
                                                            @foreach($done as $d)
                                                            <tr>
                                                            
                                                                <td> {{$a}} </td>
                                                                <td> {{ $d->name }} </td>
                                                                <td> 
                                                                    <select name="member"  id="members" class="selectpicker" >
                                                                        <option disabled selected > Select Option </option>
                                                                        @foreach($members as $m)
                                                                            <option value="{{$m->member_id}}" required > {{ $m->member_name }} : {{ $m->role_name }} </option>
                                                                        @endforeach
                                                                    </select>
                                                                </td>
                                                                <td>
                                                                    <div class="form-group">
                                                                        <input type="number" class="form-control" placeholder="Hours"  min="1" name="assigned_hours" required>
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
                                                <button type="submit" class="btn btn-success btn-fill pull-right" >Save </button>
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

