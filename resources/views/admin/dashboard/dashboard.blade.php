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
                    <a class="navbar-brand" href="#">
                    <i class="fa fa-tachometer" aria-hidden="true"></i>  Dashboard 
                        <p style="text-align:right;"> Welcome:  {{ $user->name }}</p>
                    </a>
                </div>
            </div>
        </nav>

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Agile Methods</h4>
                                <p class="category">Productivity Metric</p>
                            </div>
                            <div class="content">
                                <div align="center">
                                    <img
                                        src="https://images.pexels.com/photos/7437090/pexels-photo-7437090.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                        class="card-img-top"
                                        alt="..."
                                        width="500"
                                        />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title">Productivity</h4>
                                <p class="category">Productivity Metric</p>
                            </div>
                            <div class="content">
                                <div align="center">
                                    <img
                                        src="data:image/jpeg;base64,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"
                                        class="card-img-top"
                                        alt="..."
                                        width="500"
                                        />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    	$(document).ready(function(){
        	demo.initChartist();
        	$.notify({
            	icon: 'pe-7s-gift',
            	message: "Welcome to <b>Scrum Team Productivity </b> ."

            },{
                type: 'info',
                timer: 4000
            });

    	});
</script>

@stop