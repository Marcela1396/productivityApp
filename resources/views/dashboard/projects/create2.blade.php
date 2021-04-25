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
            <input type="hidden" name="project_name" value="{{$data['project_name']}}">
            <input type="hidden" name="project_description" value="{{$data['project_description']}}">
            <input type="hidden" name="project_start_date" value="{{$data['project_start_date']}}">
            <input type="hidden" name="project_duration" value="{{$data['project_duration']}}">
            <input type="hidden" name="sprint_quantity" value="{{$data['sprint_quantity']}}">
            <input type="hidden" name="team_id" value="{{$data['team_id']}}">

            <div class="container-fluid">
                <div class="row">
                    <div class="content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title"><i class="fa fa-list"></i>  &nbsp;Definition of Done </h4>
                                        </div>
                                        <div class="content">

                                            <div class="row">
                                                <div class="col-md-12" align="right">
                                                    <a href="javascript:addDOD.next()" class="btn btn-primary btn-fill" >
                                                        <i class="fa fa-plus"></i>
                                                    </a>
                                                </div>
                                                <div name="div_dod" id="div_dod">
                                                    <div class="dod-container">
                                                        <div class="col-md-11">
                                                            <div class="form-group">
                                                                <label> Name </label>
                                                                <input type="text" class="form-control" placeholder="Critery Name"  name="dod_name_0" required>
                                                            </div>
                                                        </div> 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="header">
                                            <h4 class="title"><i class="fa fa-star"></i>  &nbsp;Team Information</h4>
                                        </div>
                                        <div class="content">
                                             <table class="table">
                                                <thead>
                                                    <th scope="col"> ID</th>
                                                    <th scope="col"> Member Name</th>
                                                    <th scope="col"> Role </th>
                                                    
                                                </thead>
                                                @php
                                                    $a = 1;
                                                @endphp
                                                <tbody>
                                                @foreach($members as $m)
                                                    <tr>     
                                                        <td> {{$a}} </td>
                                                        <td> {{ $m->member_name }} </td>
                                                        <input type="hidden" name="{{'member_'.$m->member_id}}"  value="{{$m->member_id}}">
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="{{'role_'.$m->member_id}}"  id="role_id" class="form-control" required>
                                                                    <option disabled selected ></option>
                                                                    @foreach($roles as $r)
                                                                        <option value="{{$r->id}}" > {{$r->name}} </option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @php
                                                        $a++;
                                                    @endphp
                                                @endforeach
                                                </tbody>
                                            </table>
                                            
                                            <div class="clearfix"></div> 
                                        </div>
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
        </form>
    </div>
</div>

@stop