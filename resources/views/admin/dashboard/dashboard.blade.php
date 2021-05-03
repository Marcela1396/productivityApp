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
                                <h4 class="title"> <b> Agile Methods </b> </h4>
                            </div>
                            <div class="content">
                                <div align="center">
                                    <img
                                        src="https://image.freepik.com/foto-gratis/mujer-planeando-metodo-scrum_23-2148513848.jpg"
                                        class="card-img-top"
                                        alt="..."
                                        width="500"
                                        />
                                </div>
                                <div align="justify">
                                <br>
                                    <p> <b> Scrum </b> <br>
                                    Hoy en día las empresas de TI (equivalente al 49%) de las industrias del mercado emplean metodologías agiles 
                                    en sus proyectos, según lo muestra el Agile Adoption Report 2020 , siendo Scrum la práctica ágil más
                                    familiarizada, seguido de Kanban y en tercer lugar DevOps. Uno de los principales motivadores 
                                    para emplear  prácticas ágiles es contribuir a la satisfacción del cliente, mayor velocidad de 
                                    entrega/tiempo para mercado y mayor productividad dentro del equipo.  
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> <b> Productivity </b> </h4>
                            </div>
                            <div class="content">
                                <div align="center">
                                    <img
                                        src="https://images.pexels.com/photos/3184418/pexels-photo-3184418.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940"
                                        class="card-img-top"
                                        alt="..."
                                        width="500"
                                        />
                                </div>
                                <div align="justify">
                                <br>
                                    <p> <b> Productivity in ASD </b> <br>
                                    La productividad de equipo en ASD funciona como un indicador que permite evaluar los resultados obtenidos por parte de un equipo de 
                                    desarrollo de software tras la construcción de un producto software funcional que cumple las expectativas de un cliente. 
                                    Para el logro de ello, invierte tiempo y esfuerzo que puede derivarse de diversos factores tanto internos como externos, capacidades y 
                                    habilidades las cuales también pueden involucrar el conocimiento.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="card">
                            <div class="header">
                                <h4 class="title"> <b> Productivity Evaluation in  Scrum Team </b> </h4>
                            </div>
                            <div class="col-md-6">
                                <div class="content">
                                    <div align="center">
                                        <img
                                            src="https://image.freepik.com/foto-gratis/proyecto-empresarial-planificacion-individual_23-2148513796.jpg"
                                            class="card-img-top"
                                            alt="..."
                                            width="500"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="content">
                                    <div align="center">
                                        <img
                                            src="https://image.freepik.com/foto-gratis/hombre-barbudo-que-presenta-plan-negocios_23-2148513816.jpg"
                                            class="card-img-top"
                                            alt="..."
                                            width="500"
                                        />
                                    </div>
                                </div>
                            </div>
                            <div class="content">
                                <div align="justify">
                                <p>
                                    Este sistema web permite medir la productividad de un equipo que trabaja bajo el método de desarrollo ágil de software: Scrum.
                                    Para ello se emplea una de las Metricas de Productividad identificadas en <i> "Productivity Metrics for an Agile Software Development Team: A Systematic Review" </i> de los autores Hernandez y otros (2019) para su aplicación práctica.<br>
                                    La metrica de productividad seleccionada es <b> Capacidad de Trabajo </b> definida como las horas de trabajo dedicadas durante un Sprint para historias del usuario, terminadas o no.   
                                </p>
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