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
        <div class="container-fluid">
            <div class="row">
                <div class="header">
                    <div class="row" >
                        <div class="col-md-12" align="center">
                            <h4> Task Information </h4>
                        </div>
                        <form>
                            @foreach($tasks as $t)
                                {{$t->task_name}} <br>
                            @endforeach
                        
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>