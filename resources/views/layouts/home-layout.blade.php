<!-- HOME
Propósito: Esta vista es la página principal de la aplicación, donde se muestra contenido destacado y secciones de películas.
Contenido: Contiene la barra de navegación, una sección hero con la película destacada, una sección de películas populares y una sección de contenido que el usuario ha visto.
-->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Netflix Clone</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        body {
            margin: 0;
            font-family: 'Roboto', sans-serif;
            background-color: #141414;
            color: white;
        }

        .navbar {
            background: linear-gradient(to bottom, rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0));
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 1000; /* Colocar el navbar por encima del contenido */
            transition: background-color 0.3s ease;
            height: 70px;
            padding: 0 50px;
        }
        .navbar-nav .nav-item {
            margin-right: 5px; /* Ajusta este valor para modificar el espacio entre elementos */
        }
        .navbar-nav .nav-item:first-child {
            margin-left: 15px; /* Espacio adicional entre el logo y el primer elemento */
        }

        .navbar.scrolled {
            background-color: #141414; /* Color sólido al hacer scroll */
        }

        .navbar .logo {
            height: 30px;
        }

        .navbar-nav .nav-link {
            color: white !important;
            font-size: 14px;
            font-weight: 400;
            letter-spacing: 0.3px;
        }

        .dropdown-menu {
            background: rgba(0, 0, 0, 0.9);
            border: none;
            padding: 10px;
            border-radius: 5px;
            position: absolute;
            left: 0;
            right: auto;
            transform: translateX(-60%);
        }

        .dropdown-item {
            color: white;
        }

        .dropdown-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
        }


        .banner {
            position: relative;
            height: 90vh;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }

        .banner img {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: fill;
            z-index: -1;
        }

        .banner div {
            position: relative;
            z-index: 1;
            color: white;
        }

        .banner h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        .banner button {
            margin: 10px;
            padding: 10px 20px;
            font-size: 1rem;
            color: white;
            background-color: #e50914;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .banner button:hover {
            background-color: #f40612;
        }

        .section {
            padding: 20px;
        }

        .section img {
            width: 100%;
            height: auto;
            border-radius: 5px;
            
        }

        .carousel-container {
            position: relative;
            width: 100%;
            height: auto;
            overflow: hidden;
            padding: 20px 0px 20px 50px;
        }

        .carousel {
            position: relative;
            display: flex;
            align-items: center;
        }

        .carousel-track-container {
            overflow: hidden;
            width: 100%;
        }

        .carousel-track {
            display: flex;
            transition: transform 0.5s ease-in-out;
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .carousel-slide {
            min-width: calc(100% / 6);
            margin-right: 10px;
            height: 100%; 
        }

        .carousel-slide img {
            width: 100%;
            height: 100%; /* Make the image fill the entire slide's height */
            object-fit: cover; /* Ensure the image scales while maintaining aspect ratio */
            border-radius: 5px;
        }

        button.prev, button.next {
            position: absolute;
            top: 50%;
            transform: translateY(-50%);
            background-color: rgba(0, 0, 0, 0.0);
            color: white;
            border: none;
            font-size: 45px;
            padding: 10px;
            cursor: pointer;
            z-index: 10;
            height: 100%;
            width: 60px;
            display: none; /* Ocultar por defecto */
           
        }

        button.prev {
            left: 0; 
        }

        button.next {
            right: 0;
        }
        
        button.prev:focus, button.next:focus {
            outline: none;
        }

        button.prev, button.next {
            /* Estilos comunes para ambos botones */
            transition: background 0.3s ease, transform 0.3s ease, font-size 0.1s ease; /* Transición suave para fondo, transformación y tamaño de fuente */
        }

        button.prev:hover {
            background: linear-gradient(
                to left,
                rgba(20, 20, 20, 0.0) 0%,
                rgba(20, 20, 20, 0.3) 40%,
                rgba(20, 20, 20, 0.6) 80%,
                rgba(20, 20, 20, 0.6) 100%
            );
            transform: translateY(-50%); /* Movimiento hacia arriba */
            font-size: 65px;
        }

        button.next:hover {
            background: linear-gradient(
                to right,
                rgba(20, 20, 20, 0.0) 0%,
                rgba(20, 20, 20, 0.3) 40%,
                rgba(20, 20, 20, 0.6) 80%,
                rgba(20, 20, 20, 0.6) 100%
            );
            transform: translateY(-50%); /* Movimiento hacia arriba */
            font-size: 65px;
        }

        .carousel-container:hover button.prev,
        .carousel-container:hover button.next {
            display: block; /* Mostrar cuando el mouse está sobre el carrusel */
        }
        .footer {
            background-color: #141414;
            color: #CFCFCF;
            padding-top: 15%;
            padding-bottom: 5%;
            text-align: left;

            }

            .footer .container {
            max-width: auto;
            }

            .footer-title {
            font-weight: bold;
            }

            .footer a {
            color: #CFCFCF; /* Color de los enlaces */
            text-decoration: underline; /* Subrayado de los enlaces */
            padding: 10px 0; /* Espacio arriba y abajo de los enlaces */
            display: block; /* Asegurar que cada enlace ocupe su propia línea */
            }

            .footer a:hover {
            color: #CFCFCF; /* Color del enlace al pasar el cursor */
            }

            .footer .contact-info {
            white-space: nowrap; /* Evitar que el texto se divida en varias líneas */
            }

            @media (min-width: 768px) {
            .footer .row {
                display: flex; /* Usar flexbox para pantallas grandes */
                flex-wrap: wrap; /* Permitir que las columnas se envuelvan */
            }

            .footer .col {
                flex: 0 0 25%; /* Cuatro columnas en pantallas grandes */
                max-width: 25%; /* Cuatro columnas en pantallas grandes */
                padding: 0 10px; /* Espacio horizontal entre columnas */
            }
            }

            @media (max-width: 768px) {
            .footer .col {
                flex: 0 0 50%; /* Dos columnas en pantallas pequeñas */
                max-width: 50%; /* Dos columnas en pantallas pequeñas */
            }
            }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    window.addEventListener('scroll', function() {
        var navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) {
            navbar.classList.add('scrolled');
        } else {
            navbar.classList.remove('scrolled');
        }
    });
</script>

<script>
document.querySelectorAll('.carousel-container').forEach(carouselContainer => {
    const track = carouselContainer.querySelector('.carousel-track');
    const slides = Array.from(track.children);
    const nextButton = carouselContainer.querySelector('.next');
    const prevButton = carouselContainer.querySelector('.prev');
    const slideWidth = slides[0].getBoundingClientRect().width;
    let currentIndex = 0;

    const moveToSlide = (track, currentSlide, targetSlide) => {
        const targetIndex = slides.indexOf(targetSlide);
        track.style.transform = 'translateX(-' + targetIndex * slideWidth + 'px)';
        currentSlide.classList.remove('current-slide');
        targetSlide.classList.add('current-slide');
        currentIndex = targetIndex; // Actualiza el índice actual
    };

    slides.forEach((slide, index) => {
        slide.style.left = slideWidth * index + 'px';
    });

    nextButton.addEventListener('click', () => {
        const currentSlide = track.querySelector('.current-slide') || slides[0];
        // Calcular el índice del siguiente slide, considerando un salto de 5
        const nextIndex = (currentIndex + 5) % slides.length;
        const nextSlide = slides[nextIndex];
        moveToSlide(track, currentSlide, nextSlide);
    });

    prevButton.addEventListener('click', () => {
        const currentSlide = track.querySelector('.current-slide') || slides[0];
        // Calcular el índice del slide anterior, considerando un salto de 5
        const prevIndex = (currentIndex - 5 + slides.length) % slides.length;
        const prevSlide = slides[prevIndex];
        moveToSlide(track, currentSlide, prevSlide);
    });

    // Inicializa el primer slide como 'current-slide'
    slides[0].classList.add('current-slide');
});


</script>