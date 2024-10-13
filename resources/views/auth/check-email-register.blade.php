<!--
Propósito: Esta pantalla es un punto intermedio donde el usuario puede ir a revisar su correo para verificarlo
Contenido: unicamente muestra el correo a donde se mando el enlace de verificacion y reeenvia a la siguiente pagina (star-plan)
-->

@extends('layouts.register-layout')

@section('title', 'Configuración de Cuenta - Netflix')

@section('content')
    <div class="main-container">
        <div class="step-info">
            <div class="device-icons">
                <img src="{{ asset('images/registro-seguridad.png') }}" alt="dispositivos">
            </div>
            <h7>PASO 2 DE 4</h7>
            <h2>¡Excelente! Ahora verifiquemos tu email</h2>
            <h6>Haz clic en el enlace que enviamos a <strong>{{ session('username') }}</strong> para completar la verificación.</h6>
            <h6>Al verificar tu email, podrás mejorar la seguridad de la cuenta y recibir comunicaciones importantes de Netflix.</h6>
        </div>

        <a href="#" class="btn btn-disabled btn-block btn-next1">Omitir</a> <!--route plan.start-plan-->
    </div>
@endsection

