@extends('admin.dashboard.home')

@section('dashboard') 

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
                    <a class="navbar-brand" href="#">Teams</a>
                </div>
            </div>
        </nav>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                <div class="header">
                        <div class="row" >
                            <div class="col-md-12" align="center">
                                <h4> Teams Information </h4>
                            </div>
                            <div class="col-md-12" align="right">
                                <a class="btn btn-round btn-fill btn-primary" href="{{ route('form_create_team')}}"> <i class="fa fa-plus-circle fa-lg"> </i> </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div>
                            <table class="table">
                                <thead>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Description </th>
                                    <th scope="col">Options </th>
                                </thead>
                                @php
                                    $a = 1;
                                @endphp

                                <tbody>
                                    @foreach($team as $s)
                                    <tr>
                                    
                                        <td> {{$a}} </td>
                                        <td> {{ $s->name }} </td>
                                        <td> {{ $s->description }}</td>
                                        <td>
                                            <a class="btn btn-round btn-fill btn-warning" href="{{ route('form_update_team', $s->id) }}"> <i class="fa fa-edit fa-lg"></i></a>
                                            <a class="btn btn-round btn-fill btn-danger" href="javascript:alert_delete_team({{ $s->id}})"> <i class="fa fa-trash fa-lg"></i> </a>
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
            </div>
        </div>
</div>


@stop