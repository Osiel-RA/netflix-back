<!--
Propósito: Este archivo define la estructura común para las vistas de la aplicación, incluyendo la barra de navegación, pie de página, y la sección de contenido.
Contenido: Contiene el encabezado con los estilos y scripts necesarios para las paginas parecidas a "register", la barra de navegación
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Configuración de Cuenta - Netflix')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7a/Logonetflix.png" width="90" height="30" class="d-inline-block align-top" alt="Icono">
            nefli pirata
        </a>
    </nav>

    <div class="container">
        @yield('content')
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
