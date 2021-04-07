@extends('layouts.main')

@section('content')
<br><br>
<div class="d-flex align-items-center ">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center"> <i class="fas fa-user fa-lg"></i> {{ __(' Login ') }}</div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf
                                    <!-- Email input -->
                                <div class="form-outline mb-4">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <label class="form-label" for="loginName">Email</label>
                                    
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
                                    <label class="form-label" for="loginPassword"> Password </label>
                                </div>

                                <!-- 2 column grid layout -->
                                <div class="row mb-4">
                                    <div class="col-md-6 d-flex justify-content-center">
                                    <!-- Checkbox -->
                                        <div class="form-check mb-3 mb-md-0">
                                            <input
                                            class="form-check-input"
                                            type="checkbox"
                                            value=""
                                            id="loginCheck"
                                            checked
                                            />
                                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                            <label class="form-check-label" for="remember">
                                                {{ __('Remember me') }}
                                            </label>
                                        </div>
                                    </div>

                                    <div class="col-md-6 d-flex justify-content-center">
                                        <!-- Simple link -->
                                        <a  href="{{ route('password.request') }}"> Forgot your password? </a>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div  class="d-flex align-items-center justify-content-center">
                                    <button type="submit" class="btn btn-primary">Login</button>
                                <div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br> <br>
</div>


@stop