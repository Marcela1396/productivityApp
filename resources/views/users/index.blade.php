@extends('admin.dashboard.home')

@section('dashboard')

<div class="main-panel">
   <nav class="navbar navbar-default navbar-fixed">
      <div class="container">
         <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"> Gestión de usuarios </a>
         </div>
      </div>
   </nav>
   <div class="row">
      <div class="col col-md-6 col-sm-12 mx-auto">
         <a href="{{route('users.create')}}" class="btn bnt-success">New user </a>
      </div>
   </div>
   <div class="row">
      <div class="col col-md-11 col-sm-12 mx-auto">
         <div class="content">
            <table class="table table-striped table-inverse table-responsive">
               <thead class="thead-inverse">
                  <tr>
                     <th>Identification</th>
                     <th>Name</th>
                     <th>Email</th>
                     <th>Speciality</th>
                     <th>Role</th>
                     <th>Options</th>
                  </tr>
               </thead>
               <tbody>
                  @if(sizeof($users)>0)
                  @foreach($users as $user)
                  <tr>
                     <td scope="row">{{$user->id_number}}</td>
                     <td>{{$user->name}}</td>
                     <td>{{$user->email}}</td>
                     <td>{{$user->speciality}}</td>
                     <td>{{sizeof($user->roles)>0? $user->roles[0]->name:'without role'}}</td>
                     <td>
                        <div class="row">

                           <div class="col col-md-2">
                              <a class="label label-info" title="Editar acudiente" href="<?= url("/users/$user->id/edit") ?>"><i class="fa fa-edit"></i></a>

                           </div>

                           <div class="col col-md-2">
                              <a class="label label-danger" onclick="eliminar('<?= $user->id ?>')" title="'Eliminar"><i class="fa fa-times-circle"></i></a>

                           </div>
                        </div>
                     </td>
                  </tr>
                  @endforeach
                  @endif
               </tbody>
            </table>
         </div>
      </div>
   </div>

</div>

@stop