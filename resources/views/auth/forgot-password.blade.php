<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/forgot-password-styles.css') }}" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="{{ asset('images/logo-netflix.png') }}" width="90" height="55" class="d-inline-block align-top" alt="Icono">
           
        </a>
    </nav>

    <div class="container">
        <div class="login-form">
            <h2 class="login-title text-white">Actualizar la contraseña</h2>
            
            <form method="POST" action="{{ route('reset-password-post') }}">
                @csrf
                <input type="text" name="token" hidden value="{{ $token }}">
                <div class="form-group">
                    <label for="email" class="text-white">Correo electrónico</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{ $email }}" disable>
                
                    <label for="password1" class="text-white">Nueva contraseña</label>
                    <input type="password" name="password" id="password" class="form-control" required >
                
                    <label for="password2" class="text-white">Confirmar contraseña</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" required >
                </div>
                <button type="submit" class="btn btn-danger btn-block">Cambiar contraseña</button>
               
            </form>
        </div>
    </div>

    <div class="footer">
        <div class="container">
            <div class="contact-info">
                <p>¿Preguntas? Llama al 800 953 1430</p>
            </div>
            <div class="row">
                <div class="col">
                    <a href="#">Preguntas frecuentes</a>
                </div>
                <div class="col">
                    <a href="#">Centro de ayuda</a>
                </div>
                <div class="col">
                    <a href="#">Tienda de Netflix</a>
                </div>
                <div class="col">
                    <a href="#">Términos de uso</a>
                </div>
                <div class="col">
                    <a href="#">Privacidad</a>
                </div>
                <div class="col">
                    <a href="#">Preferencias de cookies</a>
                </div>
                <div class="col">
                    <a href="#">Información corporativa</a>
                </div>
            </div>
        </div>
    </div>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>