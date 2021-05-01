@extends('admin.dashboard.home')

@section('dashboard')

<br>
<div class="main-panel">
    <nav class="navbar navbar-default navbar-fixed navbar-ct-blue">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Assign time to Task</a>
            </div>
        </div>
    </nav>
    <div class="content">
        <form action="{{ route('register_work_hours')}}" method="POST" >
            <div class="container-fluid">
                <div class="row">
                    <div class="header">
                        <div class="row" >
                            <div class="col-md-12" align="center">
                                <h4> Task Information </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                
                    @csrf
                    <div class="col-md-12">
                        <div>
                            <table class="table">
                                <thead>
                                    <th scope="col">ID</th>
                                    <th scope="col">Task</th>
                                    <th scope="col"> Work Hours </th>
                                    <th scope="col"> Total Work Hours </th>
                                    <th scope="col"> Option </th>
                                </thead>
                                @php
                                    $a = 1;
                                @endphp

                                <tbody>
                                    @foreach($tasks as $t)
                                    <tr>
                                        <td> {{$a}} </td>
                                        <td> {{ $t->task_name }} </td>
                                        <td> 
                                            <input type="hidden" name="{{'task_id_'.$t->task_id}}"  value="{{$t->task_id}}">
                                            <div class="form-group">
                                                <br>
                                                <input type="number" min='1' class="form-control" placeholder="Work hours"  name="{{'work_hours_'.$t->task_id}}">
                                            </div>
                                        </td>

                                        <td> 
                                            <div class="form-group">
                                                <br>
                                                <input type="number" min='1' class="form-control" value="" disabled>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                @php
                                    $a++;
                                @endphp
                                @endforeach
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
            </form>
        </div>
    </div>
</div>
@stop