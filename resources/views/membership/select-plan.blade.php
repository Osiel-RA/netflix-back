<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona tu plan - Netflix</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/select-plan-styles.css') }}" rel="stylesheet">
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">
        <img src="{{ asset('images/logo-netflix.png') }}" width="90" height="55" class="d-inline-block align-top" alt="Icono">

        </a>
    </nav>
    <script>
        function selectPlan(planId) {
            document.querySelectorAll('.plan-header').forEach(header => {
                header.classList.remove('selected');
            });
            const selectedHeader = document.getElementById(planId);
            selectedHeader.classList.add('selected');
            document.getElementById(planId + '-radio').checked = true;
        }
    </script>
</head>
<body>

    <div class="main-container">
        @if (session('status'))
        <div class="alert alert-warning">
            {{ session('status') }}
        </div>
        @endif
        <!-- Step information -->
        <div class="step-info">
            <h7>PASO 3 DE 4</h7>
            <h2>Selecciona el plan ideal para ti</h2>
        </div>

        <div class="plans-container">
            <!-- Plan 1 -->
            <div class="plan">
                <div id="plan1" class="plan-header" onclick="selectPlan('plan1')">
                    Estándar con anuncios<br>1080p
                    <div class="checkmark">✔</div>
                </div>
                <div class="plan-body">
                    <p>Precio mensual: <br><strong>$99</strong></p>
                    <div class="line-divider"></div>
                    <p>Calidad de audio y video: <br><strong>Buena</strong></p>
                    <div class="line-divider"></div>
                    <p>Resolución: <br><strong>1080p (Full HD)</strong></p>
                    <div class="line-divider"></div>
                    <p>Dispositivos compatibles: <br><strong>TV, computadora, teléfono, tablet</strong></p>
                    <div class="line-divider"></div>
                    <p>Dispositivos del hogar en los que se puede ver Netflix al mismo tiempo: <br><strong>2</strong></p>
                    <div class="line-divider"></div>
                    <p>Dispositivos de descarga: <br><strong>2</strong></p>
                    <div class="line-divider"></div>
                    <p>Anuncios: <br><strong>Menos de los que esperas</strong></p>
                </div>
                <input type="radio" name="plan" id="plan1-radio" value="99" style="display: none;">
            </div>

            <!-- Plan 2 -->
            <div class="plan">
                <div id="plan2" class="plan-header" onclick="selectPlan('plan2')">
                    Estándar<br>1080p
                    <div class="checkmark">✔</div>
                </div>
                <div class="plan-body">
                    <p>Precio mensual: <br><strong>$219</strong></p>
                    <div class="line-divider"></div>
                    <p>Calidad de audio y video: <br><strong>Buena</strong></p>
                    <div class="line-divider"></div>
                    <p>Resolución: <br><strong>1080p (Full HD)</strong></p>
                    <div class="line-divider"></div>
                    <p>Dispositivos compatibles: <br><strong>TV, computadora, teléfono, tablet</strong></p>
                    <div class="line-divider"></div>
                    <p>Dispositivos del hogar en los que se puede ver Netflix al mismo tiempo: <br><strong>2</strong></p>
                    <div class="line-divider"></div>
                    <p>Dispositivos de descarga: <br><strong>2</strong></p>
                    <div class="line-divider"></div>
                    <p>Anuncios: <br><strong>Sin anuncios</strong></p>
                </div>
                <input type="radio" name="plan" id="plan2-radio" value="219" style="display: none;">
            </div>

       <!-- Plan 3 -->
       <div class="plan">
            <div id="plan3" class="plan-header plan-premium" onclick="selectPlan('plan3')">
                Premium<br>4K + HDR
                <div class="checkmark">✔</div>
            </div>
            <div class="plan-body">
                <p>Precio mensual: <br><strong>$299</strong></p>
                <div class="line-divider"></div>
                <p>Calidad de audio y video: <br><strong>Óptima</strong></p>
                <div class="line-divider"></div>
                <p>Resolución: <br><strong>4K (Ultra HD) + HDR</strong></p>
                <div class="line-divider"></div>
                <p>Audio espacial (sonido inmersivo): <br><strong>Incluido</strong></p>
                <div class="line-divider"></div>
                <p>Dispositivos compatibles: <br><strong>TV, computadora, teléfono, tablet</strong></p>
                <div class="line-divider"></div>
                <p>Dispositivos del hogar en los que se puede ver Netflix al mismo tiempo: <br><strong>4</strong></p>
                <div class="line-divider"></div>
                <p>Dispositivos de descarga: <br><strong>6</strong></p>
                <div class="line-divider"></div>
                <p>Anuncios: <br><strong>Sin anuncios</strong></p>
            </div>
            <input type="radio" name="plan" id="plan3-radio" value="299" style="display: none;">
        </div>
    </div>
    <a href="{{ route('membership.select-pay') }}" class="btn btn-next">Siguiente</a>   <!-- DEBE CAMBIARSE POR BOTON -->
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col">
                    <h5 class="footer-title">Netflix</h5>
                    <a href="#">¿Quiénes somos?</a>
                    <a href="#">Centro de ayuda</a>
                    <a href="#">Prensa</a>
                </div>
                <div class="col">
                    <h5 class="footer-title">Cuenta</h5>
                    <a href="#">Administrar perfil</a>
                    <a href="#">Preferencias de cookies</a>
                    <a href="#">Política de privacidad</a>
                </div>
                <div class="col">
                    <h5 class="footer-title">Contáctanos</h5>
                    <div class="contact-info">
                        <a href="#">Facebook</a>
                        <a href="#">Twitter</a>
                        <a href="#">Instagram</a>
                    </div>
                </div>
                <div class="col">
                    <h5 class="footer-title">Legal</h5>
                    <a href="#">Términos de uso</a>
                    <a href="#">Accesibilidad</a>
                    <a href="#">Aviso legal</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>
