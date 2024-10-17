<!--
Propósito: Esta vista es decorativa, es solo un punto medio antes de empezar el proceso de registrarse
Contenido: Contiene un div con info 
-->
@extends('layouts.register-layout')

@section('title', 'Configuración de Cuenta - Netflix')

@section('content')
    <div class="main-container">
        <div class="step-info">
            <div class="device-icons">
                <img src="{{ asset('images/registro-dispositivos.png') }}" alt="dispositivos">
            </div>
            <h7>PASO 1 DE 4</h7>
            <h2>Completa la configuración de tu cuenta</h2>
            <h6>Netflix está personalizado para ti.</br>
            Crea una contraseña para comenzar a ver Netflix.</h6>
        </div>

        <form action="{{ route('register') }}" method="GET">
            <button type="submit" class="btn btn-danger btn-block btn-next">Siguiente</button>
        </form>
    </div>
@endsection