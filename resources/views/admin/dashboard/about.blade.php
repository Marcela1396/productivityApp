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
                    <a class="navbar-brand" href="#">About us</a>
                </div>
            </div>
        </nav>
<br>
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://image.freepik.com/foto-gratis/imagen-primer-plano-programador-trabajando-su-escritorio-oficina_1098-18707.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="https://media-exp1.licdn.com/dms/image/C4E03AQGNnu3SaqS-sg/profile-displayphoto-shrink_800_800/0/1617198480293?e=1625097600&v=beta&t=pEQZYzUdtwew3ikbHNoP__jNdJ9K2tpUmrIgBHxEwb8" alt="..."/>

                                      <h4 class="title">Sandra Marcela Guerrero Calvache<br />
                                         <small>Student  </small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> 
                                    <b> Master of Science in Systems and Computing </b> <br>
                                     marcela1396@udenar.edu.co <br>
                                    310 527 37 27 <br>               
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="https://www.linkedin.com/in/marcela-guerrero-b79659169/" class="btn btn-simple"><i class="fa fa-linkedin"></i></a>
                                <a href="https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0000040600" class="btn btn-simple"><i class="fa fa-globe"></i></a>
                                <a href="https://scholar.google.com/citations?user=JKyFmKEAAAAJ&hl=es&oi=sra" class="btn btn-simple"><i class="fa fa-google"></i></a>
                            </div>
                        </div>
                    </div>
                    <!-- Other card -->
                    <div class="col-md-6">
                        <div class="card card-user">
                            <div class="image">
                                <img src="https://image.freepik.com/foto-gratis/imagen-primer-plano-programador-trabajando-su-escritorio-oficina_1098-18707.jpg" alt="..."/>
                            </div>
                            <div class="content">
                                <div class="author">
                                     <a href="#">
                                    <img class="avatar border-gray" src="https://media-exp1.licdn.com/dms/image/C4E03AQEkNhFcEAUIUw/profile-displayphoto-shrink_800_800/0/1532641628670?e=1625097600&v=beta&t=7rmBfO2Dbha-Z5lwPtvmRGhBYyLb0qAqigm-4d6hOiw" alt="..."/>

                                      <h4 class="title">Giovanni Hernandez Pantoja<br />
                                         <small> Teacher  </small>
                                      </h4>
                                    </a>
                                </div>
                                <p class="description text-center"> 
                                    <b> Master of Science in Systems and Computing </b> <br>
                                    gihernandezp@gmail.com  <br>
                                    3006542483 <br>               
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <a href="https://www.linkedin.com/in/giovanni-hernandez-949b6456/" class="btn btn-simple"><i class="fa fa-linkedin"></i></a>
                                <a href="https://scienti.minciencias.gov.co/cvlac/visualizador/generarCurriculoCv.do?cod_rh=0001157337" class="btn btn-simple"><i class="fa fa-globe"></i></a>
                                <a href="https://scholar.google.com/citations?user=LJXq3zkAAAAJ&hl=es&oi=sra" class="btn btn-simple"><i class="fa fa-google"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        
    </div>
</div>

@stop