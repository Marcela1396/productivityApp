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
            <a class="navbar-brand" href="#"> Crear usuario </a>
         </div>
      </div>
   </nav>
   <div class="content">
      <form action="{{ route('users.store')}}" method="POST">
         @csrf
         <div class="container-fluid">
            <div class="row">
               <div class="content">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-md-12">
                           <div class="card">
                              <div class="header">
                                 <h4 class="title"><i class="fa fa-star"></i> &nbsp;User Information</h4>
                              </div>
                              <div class="content">
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label><i class="fa fa-newspaper-o"></i> Identification number </label>
                                          <input type="text" class="form-control" placeholder="Card ID" name="id_number">
                                       </div>
                                    </div>

                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label><i class="fa fa-clipboard"></i> Name</label>
                                          <input type="text" class="form-control" placeholder="Member Name" name="name">
                                       </div>
                                    </div>

                                 </div>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label><i class="fa fa-envelope"></i> Email </label>
                                          <input type="email" class="form-control" placeholder="Email" name="email">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label><i class="fa fa-user"></i> Speciality</label>
                                          <input type="text" class="form-control" placeholder="Speciality" name="speciality">
                                       </div>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6 col-sm-12 mx-auto">
                                    <div class="form-group">
                                    <label for="rol"><i class="fa fa-user"></i> Role</label></label>
                                    <select name="role" class="form-control">
                                        <option value="0">Select a role</option>
                                        @foreach($roles as $role)
                                          @if(!isset($user))
                                             <option value="{{$role['id']}}">{{$role['name']}}</option>
                                          @else
                                             <option value="{{$role['id']}}" <?= $user['role'] == $role->id ? 'selected' : '' ?>>{{$role['name']}}</option>
                                          @endif
                                        @endforeach
                                    </select>
                                    @error('esturole')
                                    <span class="text-red"> Hay errores en este campo</span>
                                    @enderror
                                </div>
                                    </div> 
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label><i class="fa fa-user"></i> Password</label>
                                          <input type="password" class="form-control" placeholder="password" name="password">
                                       </div>
                                    </div>
                                 </div>

                                 <div class="row">
                                    <div class="col-md-6 col-sm-12 mx-auto">
                                       <button type="submit" class="btn btn-success btn-fill pull-right"><i class="fa fa-save"></i> Save</button>
                                       <div class="clearfix"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>

                     </div>
                  </div>
               </div>
            </div>
         </div>
   </div>
   </form>
   </div>
</div>

@stop