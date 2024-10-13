<!-- HOME
Propósito: Esta vista muestra una sección de películas populares en la página principal.
Contenido: Contiene imágenes de las películas más populares en la plataforma para que los usuarios las vean y seleccionen.
-->
<div class="carousel-container" id="carousel3">
    <h5>Películas Populares</h5>
    <div class="carousel">
        <button class="prev">&#10094;</button>
        <div class="carousel-track-container">
            <ul class="carousel-track">
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos.jpg') }}" alt="Popular Movie 1"></li>
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos-2.jpg') }}" alt="Popular Movie 2"></li>
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos.jpg') }}" alt="Popular Movie 3"></li>
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos-2.jpg') }}" alt="Movie 4"></li>
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos.jpg') }}" alt="Movie 5"></li>
                <li class="carousel-slide"><img src="{{ asset('images/Netlix-temporalportada-videos-2.jpg') }}" alt="Movie 4"></li>
                <!-- Agrega más películas aquí -->
            </ul>
        </div>
        <button class="next">&#10095;</button>
    </div>
</div>