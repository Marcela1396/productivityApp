<!-- 
Vista que se relaciona con el formulario de restablecimiento de contraseña, donde se envia
el link de recuperación
 -->
@extends('layouts.main')

@section('content')
<br><br>
<div class="d-flex align-items-center ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center"> <i class="fas fa-key"></i> {{ __(' Restablecer Contraseña ') }}</div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                        <div class="card-body">
                            <form method="POST" action="{{ route('password.request') }}">
                                @csrf
                                    <!-- Email input -->
                                <div class="form-outline mb-4">
                                    
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label class="form-label" for="loginName">Correo electronico</label>
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                            </span>
                                    @enderror
                                </div>

                                <!-- Submit button -->
                                <div  class="d-flex align-items-center justify-content-center">
                                    <button type="submit" class="btn btn-primary">Restablecer</button>
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