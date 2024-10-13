<!-- HOME
Propósito: Esta vista muestra una sección de contenido que el usuario ha visto en la página principal.
Contenido: Permite a los usuarios retomar la visualización de películas o series que han comenzado pero no han terminado.
-->
<div class="carousel-container" id="carousel2">
    <h5>Continua viendo...</h5>
    <div class="carousel">
        <button class="prev">&#10094;</button>
        <div class="carousel-track-container">
            <ul class="carousel-track">
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos-2.jpg') }}" alt="Movie 1"></li>
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos.jpg') }}" alt="Movie 2"></li>
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos-2.jpg') }}" alt="Movie 3"></li>
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos.jpg') }}" alt="Movie 4"></li>
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos-2.jpg') }}" alt="Movie 5"></li>
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos-2.jpg') }}" alt="Movie 4"></li>
                <!-- Agrega más películas aquí -->
            </ul>
        </div>
        <button class="next">&#10095;</button>
    </div>
</div>