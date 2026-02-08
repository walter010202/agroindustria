@extends('adminlte::auth.auth-page', ['authType' => 'login'])

@section('adminlte_css_pre')
<link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">

<style>
/* Fondo agroindustrial claro */
.login-page {
    background: linear-gradient(135deg, #E8F5E9, #C8E6C9);
}

/* Ocultar texto AdminLTE */
.login-logo {
    display: none;
}

/* Card moderna */
.card {
    border-radius: 16px;
    box-shadow: 0 10px 30px rgba(0,0,0,.12);
}

/* Botón institucional */
.btn-agro {
    background-color: #43A047;
    color: #ffffff;
    font-weight: 600;
}

.btn-agro:hover {
    background-color: #388E3C;
    color: #ffffff;
}

/* Inputs más modernos */
.form-control {
    border-radius: 8px;
    padding: 12px;
}

/* Subtítulo */
.agro-subtitle {
    font-size: 0.95rem;
    color: #6c757d;
}
</style>
@stop

@php
    $loginUrl = View::getSection('login_url') ?? config('adminlte.login_url', 'login');
    $registerUrl = View::getSection('register_url') ?? config('adminlte.register_url', 'register');
    $passResetUrl = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset');

    if (config('adminlte.use_route_url', false)) {
        $loginUrl = $loginUrl ? route($loginUrl) : '';
        $registerUrl = $registerUrl ? route($registerUrl) : '';
        $passResetUrl = $passResetUrl ? route($passResetUrl) : '';
    } else {
        $loginUrl = $loginUrl ? url($loginUrl) : '';
        $registerUrl = $registerUrl ? url($registerUrl) : '';
        $passResetUrl = $passResetUrl ? url($passResetUrl) : '';
    }
@endphp

@section('auth_header')
<div class="text-center mb-3">
    {{-- Logo opcional --}}
    {{-- <img src="{{ asset('img/agroindustria.png') }}" width="70" class="mb-2"> --}}

    <h4 class="font-weight-bold text-success mb-1">
        Sistema de Monitoreo de Prácticas de Laboratorio
    </h4>
    <p class="agro-subtitle">
        Carrera de Agroindustria · Universidad Agraria del Ecuador
    </p>
</div>
@stop

@section('auth_body')
<form action="{{ $loginUrl }}" method="post">
    @csrf

    {{-- Correo --}}
    <div class="input-group mb-3">
        <input type="email"
               name="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}"
               placeholder="Correo institucional"
               autofocus>

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope text-success"></span>
            </div>
        </div>

        @error('email')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    {{-- Contraseña --}}
    <div class="input-group mb-3">
        <input type="password"
               name="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="Contraseña">

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock text-success"></span>
            </div>
        </div>

        @error('password')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    <div class="row align-items-center">
        <div class="col-7">
            <div class="icheck-success">
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">
                    Recordarme
                </label>
            </div>
        </div>

        <div class="col-5">
            <button type="submit" class="btn btn-agro btn-block">
                <i class="fas fa-sign-in-alt mr-1"></i>
                Ingresar
            </button>
        </div>
    </div>
</form>
@stop

@section('auth_footer')
{{-- Olvidó contraseña --}}
@if($passResetUrl)
<p class="my-1 text-center">
    <a href="{{ $passResetUrl }}">
        ¿Olvidó su contraseña?
    </a>
</p>
@endif

{{-- Registro --}}
@if($registerUrl)
<p class="my-0 text-center">
    <span class="text-muted">¿Eres nuevo?</span>
    <a href="{{ $registerUrl }}">
        Crea tu cuenta aquí
    </a>
</p>
@endif
@stop



