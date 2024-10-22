<!--
Propósito: Este archivo actúa como un diseño base para las vistas de autenticación.
Contenido: Define la estructura general de la página, incluyendo la inclusión de la 
barra de navegación (auth-navbar.blade.php), el contenido específico de la vista (login.blade.php), 
y el pie de página (auth-footer.blade.php). Utiliza secciones para inyectar contenido específico de cada vista.
-->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Inicio de Sesión')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/login-form.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>
<body class="login-body" >
    @include('components.auth-navbar') <!-- Incluir la navbar -->
    
    <div class="container">
        @yield('content') <!-- Contenido específico de la vista -->
    </div>

    @include('components.auth-footer') <!-- Incluir el footer -->
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.0.7/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
