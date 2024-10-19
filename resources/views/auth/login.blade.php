<!--
Propósito: Esta vista es la página de inicio de sesión donde los usuarios ingresan sus credenciales (email y contraseña).
Contenido: Contiene el formulario de inicio de sesión, mensajes de error (si los hay), y enlaces para recuperar contraseñas o registrarse.
-->
@extends('layouts.auth-layout')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="login-form">
        <h2 class="login-title text-white">Iniciar Sesión</h2>
        @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
        @endif
        <!-- Sección de errores -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login-user') }}">  <!-- Aquí se enlaza la ruta 'login-user' -->
            @csrf
            <div class="form-group">
                <input type="text" name="username" id="username" class="form-control" required placeholder=" ">
                <label for="username" class="text-white">Email o número celular</label>
            </div>
            <div class="form-group">
                <input type="password" name="password" id="password" class="form-control" required placeholder=" ">
                <label for="password" class="text-white">Contraseña</label>
            </div>
            <button type="submit" class="btn btn-danger btn-block">Iniciar sesión</button>
            <a href="{{ route('forget-password') }}" class="link-transparent text-center d-block mt-3">¿Olvidaste la contraseña?</a>
             
            <div class="registration-info mt-3">
                <label class="d-flex align-items-end">
                    <input type="checkbox" name="remember" class="form-check-input">
                    <span style="margin-left: 10px; color: #CFCFCF;">Recuérdame</span>
                </label>
                <p>¿Primera vez en Netflix? <a href="{{ route('start-register') }}"  class="text-white font-weight-bold">Suscríbete ahora.</a></p>
            </div>  
        </form>
    </div>
@endsection

