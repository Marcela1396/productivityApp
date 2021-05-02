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
                <a class="navbar-brand" href="#"> <i class="fa fa-clock-o" aria-hidden="true"></i>  Work Hours</a>
            </div>
        </div>
    </nav>
    <div class="content">
        <form action="{{ route('register_work_hours')}}" method="POST" >
            <div class="container-fluid">
                <div class="row">
                    <div class="header">
                        <div class="row">
                            <div class="col-md-12"  id="contenedor"> 
                                <b> <i class="fa fa-calendar" aria-hidden="true"></i> Sprint : </b> {{ $tasks->first()->sprint_name }} <br>
                                <b> <i class="pe-7s-paper-plane" aria-hidden="true"></i> User Story : </b>{{ $tasks->first()->user_story_name }} <br>
                                <b> <i class="fa fa-user" aria-hidden="true"></i>  Member : </b>{{ $tasks->first()->user_name }} <br>
                                <b> <i class="fa fa-clock-o" aria-hidden="true"></i> Assigned Hours :</b> {{ $tasks->first()->total_assigned_hours }} <br>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                
                    @csrf
                    <div class="col-md-12">
                        <div>
                        <br><br>
                            <table class="table">
                                <thead>
                                    <th scope="col">ID</th>
                                    <th scope="col">Task</th>
                                    <th scope="col"> Work Hours </th>
                                    <th scope="col"> Total Work Hours </th>
                                    <th scope="col"> Finished Work  </th>
                                </thead>
                                @php
                                    $a = 1;
                                @endphp
                                <input type="hidden" name="user_story_id"  value=" {{ $tasks->first()->user_story_id }}">
                                <tbody>
                                    @foreach($tasks as $t)
                                    <tr>
                                        <td> {{$a}} </td>
                                        <td> {{ $t->task_name }} </td>
                                        @if($t->finished_task == 0)
                                            <td> 
                                                <input type="hidden" name="{{'task_id_'.$t->user_task_id}}"  value="{{$t->user_task_id}}">
                                                <div class="form-group">
                                                    <br>
                                                    <input type="number" min='1' class="form-control" placeholder="Work hours"  name="{{'work_hours_'.$t->user_task_id}}">
                                                </div>
                                            </td>

                                            <td> 
                                                <div class="form-group">
                                                    <br>
                                                    <input type="number" min='1' class="form-control" value="{{$t->worked_hours}}" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="{{'workRadio_id_'.$t->user_task_id}}" id="exampleRadios2" value=1 checked>
                                                        Yes
                                                        <input class="form-check-input" type="radio" name="{{'workRadio_id_'.$t->user_task_id}}" id="exampleRadios2" value=0 checked>
                                                        No
                                                    </label>
                                                </div>
                                            </td>
                                        @else
                                            <td> 
                                                <div class="form-group">
                                                    <br>
                                                    <input  disabled type="number" min='1' class="form-control" placeholder="Work hours" >
                                                </div>
                                            </td>

                                            <td> 
                                                <div class="form-group">
                                                    <br>
                                                    <input type="number" min='1' class="form-control" value="{{$t->worked_hours}}" disabled>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="form-group">
                                                    <label class="form-check-label">
                                                        <input class="form-check-input" type="radio" name="{{'workRadio_id_'.$t->user_task_id}}" id="exampleRadios2"  disabled>
                                                        Yes
                                                        <input class="form-check-input" type="radio" name="{{'workRadio_id_'.$t->user_task_id}}" id="exampleRadios2" disabled>
                                                        No
                                                    </label>
                                                </div>
                                            </td>
                                        @endif
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
                    <div class="col-md-12" align ="right">
                        <a class="btn btn-primary btn-fill" href="{{route('stories', $tasks->first()->sprint_id)}}"> <i class="fa fa-undo fa-lg"></i> </a>
                        <button type="submit" class="btn btn-success btn-fill pull-center" ><i class="fa fa-save"></i> Save </button>
                        <div class="clearfix"></div>
                    </div>
                </div>   
            </form>
        </div>
    </div>
</div>
@stop