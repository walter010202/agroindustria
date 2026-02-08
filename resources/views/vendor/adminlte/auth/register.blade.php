@extends('adminlte::auth.auth-page', ['authType' => 'register'])

@php
    $loginUrl = View::getSection('login_url') ?? config('adminlte.login_url', 'login');
    $registerUrl = View::getSection('register_url') ?? config('adminlte.register_url', 'register');

    if (config('adminlte.use_route_url', false)) {
        $loginUrl = $loginUrl ? route($loginUrl) : '';
        $registerUrl = $registerUrl ? route($registerUrl) : '';
    } else {
        $loginUrl = $loginUrl ? url($loginUrl) : '';
        $registerUrl = $registerUrl ? url($registerUrl) : '';
    }
@endphp

{{-- HEADER CON LOGO --}}
@section('auth_header')
    <div class="text-center mb-3">
        <h4 class="font-weight-bold mb-0">
            Registro de Usuario
        </h4>

        <small class="text-muted">
            Sistema de Monitoreo de Prácticas de Laboratorio<br>
            Carrera de Agroindustria – Universidad Agraria del Ecuador
        </small>
    </div>
@stop

@section('auth_body')
<form action="{{ $registerUrl }}" method="post">
    @csrf

    {{-- Nombre --}}
    <div class="input-group mb-3">
        <input type="text" name="name"
               class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name') }}"
               placeholder="Nombre completo">

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-user"></span>
            </div>
        </div>

        @error('name')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    {{-- Correo --}}
    <div class="input-group mb-3">
        <input type="email" name="email"
               class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email') }}"
               placeholder="Correo institucional">

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-envelope"></span>
            </div>
        </div>

        @error('email')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    {{-- Contraseña --}}
    <div class="input-group mb-3">
        <input type="password" name="password"
               class="form-control @error('password') is-invalid @enderror"
               placeholder="Contraseña">

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>

        @error('password')
            <span class="invalid-feedback"><strong>{{ $message }}</strong></span>
        @enderror
    </div>

    {{-- Confirmar contraseña --}}
    <div class="input-group mb-3">
        <input type="password" name="password_confirmation"
               class="form-control"
               placeholder="Confirmar contraseña">

        <div class="input-group-append">
            <div class="input-group-text">
                <span class="fas fa-lock"></span>
            </div>
        </div>
    </div>

    {{-- Botón --}}
    <button type="submit" class="btn btn-success btn-block">
        <span class="fas fa-user-plus"></span>
        Crear cuenta
    </button>
</form>
@stop

@section('auth_footer')
    <p class="my-0 text-center">
        <a href="{{ $loginUrl }}">
            ¿Ya tienes una cuenta? Inicia sesión
        </a>
    </p>
@stop

