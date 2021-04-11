
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
                    <a class="navbar-brand" href="#"> Projects </a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
    
                            <div class="header">
                                <h4 class="title">Allocate Team to Project</h4>
                            </div>
                            <div>
                                <table class="table">
                                    <thead>
                                        <th scope="col">ID</th>
                                    	<th scope="col">Name</th>
                                    	<th scope="col">Sprint Quantity</th>
                                        <th scope="col">State</th>
                                        <th scope="col"> Team </th>
                                        <th scope="col"> Options </th>
                                    </thead>

                                    <tbody>
                                        @foreach($projects as $p)
                                        <tr>
                                        
                                            <td> {{ $p->id }} </td>
                                            <td> {{ $p->name }} </td>
                                            <td> {{ $p->sprint_quantity }}</td>
                                            @if($p->state == 'C')
                                                <td> Created </td>
                                            @elseif($p->state == 'A')
                                                <td> Allocated </td>
                                            @elseif($p->state == 'S')
                                                <td> In Progress </td>
                                            @elseif($p->state == 'F')
                                                <td> Finished </td>
                                            @endif


                                            @if($p->state == 'C')
                                                <form action="{{ route('save_team') }}" method="POST">
                                                    @csrf
                                                    <td>
                                                        <input type="hidden" id='project' name='project_id' value="{{$p->id}}">
                                                        <input type="hidden" id='state' name='state' value="A">
                                                        <select name="team_id"  id="team" class="selectpicker">
                                                            <option disabled selected > Select Option </option>
                                                            @foreach($teams as $t)
                                                                <option value="{{$t->id}}" > {{$t->name}} </option>
                                                            @endforeach
                                                        </select>
                                                    </td>
                                                    <td>
                                                        <button type="submit" class="btn btn-round btn-fill btn-info"> Save </button>
                                                        <a class="btn btn-round btn-fill btn-success" disabled> Start </a>
                                                    </td>
                                                </form>
                                            @else
                                                <td>
                                                    <select name="team_id"  id="team" disabled>
                                                        @foreach($teams as $t)
                                                            <option value="" > {{$t->name}} </option>
                                                        @endforeach
                                                    </select>
                                                </td>

                                                <td>
                                                    <button type="submit" class="btn btn-round btn-fill btn-info" disabled> Save </button>
                                                    <a class="btn btn-round btn-fill btn-success" href="{{ route('sprints') }}"> Start </a>
                                                </td>
                                            @endif
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                    </div> 
                </div>
            </div>
        </div>
</div>

@stop