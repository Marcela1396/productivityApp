@extends('layouts.main')

@section('content')
<br><br>
<div class="d-flex align-items-center ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center"> <i class="fas fa-plane-departure fa-lg"></i> {{ __(' Registrar Usuario ') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('register') }}">
                                @csrf
                                    <!-- Email input -->

                                <div class="form-outline mb-4">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                    <label class="form-label" for="loginName">Nombre de Usuario </label>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                
                                <div class="form-outline mb-4">
                                    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label class="form-label" for="loginName">Correo electronico</label>
                                    

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                    
                                </div>

                                <!-- Password input -->
                                <div class="form-outline mb-4">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label class="form-label" for="loginPassword">Contraseña </label>
                                </div>


                                <div class="form-outline mb-4">
                                    
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                    <label class="form-label" for="password-confirm"> Confirmar Contraseña </label>
                                </div>

                                <!-- Submit button -->
                                <div  class="d-flex align-items-center justify-content-center">
                                    <button type="submit" class="btn btn-primary">Registrar </button>
                                <div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@stop