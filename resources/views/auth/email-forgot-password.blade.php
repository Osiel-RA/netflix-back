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
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7a/Logonetflix.png" width="90" height="30" class="d-inline-block align-top" alt="Icono">
            nefli pirata
        </a>
    </nav>
   
    <div class="container">
        
        <div class="login-form">
            
            <h3 class="login-title text-white">¿Olvidaste tu contraseña?</h3>
            <p class="login-title text-white">Solicita el cambio de contraseña a tu correo</p>
            <form method="POST" action="{{ route('forget-password-post') }}">
                @csrf
                <div class="form-group">
                <label for="user_identifier" class="text-white">Email</label>
                    <input type="email" name="email" id="email" class="form-control" required >
                </div>
                @if(session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }} <a href="{{ route('start-register') }}"  class=" font-weight-bold" >Registrate.</p> </li>
                                
                            @endforeach
                        </ul>
                    </div>
                @endif
                <button type="submit" class="btn btn-danger btn-block">Enviar solucitud</button>
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