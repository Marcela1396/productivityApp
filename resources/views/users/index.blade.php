@extends('admin.dashboard.home')

@section('dashboard')

<div class="main-panel">
   <nav class="navbar navbar-default navbar-fixed navbar-ct-blue">
      <div class="container">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> User Management </a>
         </div>
      </div>
   </nav>
   <input type="hidden" id="url" value="<?= url('/users') ?>">
   <input type="hidden" id="url_table" value="<?= url('') ?>">
   <div class="row" id="respuesta"></div>
   <div class="content">
      <div class="container-fluid">
         <div class="row">
            <div class="header">
               <div class="row">
                  <div class="col-md-12" align="center">
                     <h4> User Information </h4>
                  </div>
                  <div class="col-md-12" align="right">
                     <a href="{{route('users.create')}}" class="btn btn-round btn-fill btn-primary"> <i class="fa fa-plus-circle fa-lg"> </i> </a>
                  </div>
               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-md-12">
               <div>
                  <table class="table">
                     <thead class="thead-inverse">
                        <tr>
                           <th scope="col">º</th>
                           <th scope="col">Identification</th>
                           <th scope="col">Name</th>
                           <th scope="col">Email </th>
                           <th scope="col">Speciality </th>
                           <th scope="col">Role </th>
                           <th scope="col">Options </th>
                        </tr>
                     </thead>
                     @php
                     $a = 1;
                     @endphp

                     <tbody>
                        @if(sizeof($users)>0)
                        @foreach($users as $user)
                        <tr>
                           <td> {{$a}} </td>
                           <td scope="row">{{$user->id_number}}</td>
                           <td>{{$user->name}}</td>
                           <td>{{$user->email}}</td>
                           <td>{{$user->speciality}}</td>
                           <td>{{sizeof($user->roles)>0? $user->roles[0]->name:'without role'}}</td>
                           <td>
                              <a class="btn btn-round btn-fill btn-warning" title="Editar acudiente" href="<?= url("/users/$user->id/edit") ?>"><i class="fa fa-edit"></i></a>
                              <a class="btn btn-round btn-fill btn-danger" onclick="eliminar('<?= $user->id ?>')" title="'Eliminar"><i class="fa fa-times-circle"></i></a>
                           </td>
                        </tr>
                        @php
                        $a++;
                        @endphp
                        @endforeach
                        @endif
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>

@stop