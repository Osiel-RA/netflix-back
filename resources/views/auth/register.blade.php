<!--
Propósito: Esta vista es la página de registro donde los usuarios ingresan su nombre, correo electrónico y contraseña para crear una cuenta.
Contenido: Contiene el formulario para el registro de un nuevo usuario, incluye campos para el nombre, correo electrónico y contraseña, así como los mensajes de error si los hay.
También incluye un botón para enviar y avanzar al siguiente paso del proceso de registro.
-->
@extends('layouts.register-layout')

@section('title', 'Crea una cuenta - Netflix')

@section('content')
    <div class="main-container">
            <div class="step-info">
                <h7>PASO 1 DE 4</h7>
                <h2>Crea una contraseña para que comiences tu membrecia</h2>
                <h6>¡Unos pasos más y listo!</br>
                Tampoco nos gustan los trámites.</h6>
            </div>
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

            <form method="POST" action="{{ route('register-user') }}"> 
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" name="name" id="name" class="form-control" required placeholder=" ">

                    <label for="username">Correo electrónico</label>
                    <input type="email" name="username" id="username" class="form-control" required placeholder=" ">
                    
                    <label for="phone">Numero de telefono</label>
                    <input type="tel" name="phone" id="phone" class="form-control" required placeholder=" ">

                    <label for="password">Agregar una contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required placeholder=" ">

                </div>
                <button type="submit" class="btn btn-danger btn-block btn-next">Siguiente</button>
            </form>
        </div>
    </div>
@endsection
