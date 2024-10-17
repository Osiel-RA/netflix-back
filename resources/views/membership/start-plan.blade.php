<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona tu plan - Netflix</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('css/plan-styles.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
            <img src="https://upload.wikimedia.org/wikipedia/commons/7/7a/Logonetflix.png" width="90" height="30" class="d-inline-block align-top" alt="Icono">
            nefli pirata
        </a>
    </nav>

    <div class="main-container">
        <!-- Image above the step info -->
        <div class="device-icons">
            <img src="{{ asset('images/plan-palomitarojaciruclo.png') }}" alt="dispositivos" width="250">
        </div>
        
        <div class="step-info">
            <h7>PASO 3 DE 4</h7>
            <h2>Selecciona tu plan</h2>
            <ul class="checklist">
                <li>
                    <img src="{{ asset('images/plan-palomitaroja.png') }}" alt="check" class="check-icon">
                    Sin compromisos, cancela cuando quieras.
                </li>
                <li>
                    <img src="{{ asset('images/plan-palomitaroja.png') }}" alt="check" class="check-icon">
                    Entretenimiento sin fin a un bajo costo.
                </li>
                <li>
                    <img src="{{ asset('images/plan-palomitaroja.png') }}" alt="check" class="check-icon">
                    Disfruta de Netflix en todos tus dispositivos.
                </li>
            </ul>
        </div>
        <a href="{{ route('membership.select-plan') }}" class="btn btn-danger btn-block btn-next">Siguiente</a>
        
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
