<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selecciona una imagen para tu perfil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <style>
        body {
            background-color: #141414; /* Color de fondo negro */
            color: white; /* Color de texto blanco */
        }
        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .image-selection-container {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }
        .image-option {
            margin: 10px;
            cursor: pointer;
            border: 2px solid transparent; /* Borde transparente para el efecto de selección */
            transition: border-color 0.3s;
        }
        .image-option:hover {
            border-color: #e50914; /* Color de borde al pasar el mouse */
        }
        .selected {
            border-color: #e50914; /* Color de borde para la imagen seleccionada */
        }
        img {
            border-radius: 10px; /* Bordes redondeados para las imágenes */
        }
        .btn-success {
            background-color: #e50914; /* Color de fondo rojo para el botón */
            color: white; /* Color de texto blanco */
            border: none; /* Sin borde */
            padding: 10px 20px; /* Espaciado */
            border-radius: 5px; /* Bordes redondeados */
            cursor: pointer; /* Cursor de mano al pasar */
            font-size: 16px; /* Tamaño de fuente */
            transition: background-color 0.3s; /* Transición de color */
        }
        .btn-success:hover {
            background-color: #b00710; /* Color más oscuro al pasar el mouse */
        }
        .text-center {
            text-align: center; /* Alinear el contenido al centro */
            margin-top: 20px; /* Espacio superior */
        }
    </style>
</head>
<body>
    <h1>Selecciona una imagen para tu perfil</h1>
    <form action="{{ route('profiles.updateImage', $profile->id) }}" method="POST">
        @csrf
        <div class="image-selection-container">
            <div class="image-option" onclick="selectImage(this, 'images/profile1.png')">
                <img src="{{ asset('images/profile1.png') }}" alt="Perfil 1" width="100">
            </div>
            <div class="image-option" onclick="selectImage(this, 'images/profile2.png')">
                <img src="{{ asset('images/profile2.png') }}" alt="Perfil 2" width="100">
            </div>
            <div class="image-option" onclick="selectImage(this, 'images/profile3.png')">
                <img src="{{ asset('images/profile3.png') }}" alt="Perfil 3" width="100">
            </div>
            <!-- Agrega más imágenes si lo deseas -->
        </div>
        <input type="hidden" name="image_url" id="image_url" value="">
        <div class="text-center">
            <button type="submit" class="btn btn-success">Guardar imagen</button>
        </div>
    </form>

    <script>
        function selectImage(element, imageUrl) {
            // Eliminar la clase 'selected' de todas las opciones
            const options = document.querySelectorAll('.image-option');
            options.forEach(option => option.classList.remove('selected'));
            // Agregar la clase 'selected' a la opción seleccionada
            element.classList.add('selected');
            // Establecer la URL de la imagen seleccionada en el campo oculto
            document.getElementById('image_url').value = imageUrl;
        }
    </script>
</body>
</html>
