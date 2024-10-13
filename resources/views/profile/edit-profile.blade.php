<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Perfil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <style>
    .profile {
        position: relative; /* Habilita el posicionamiento relativo para el contenedor */
        display: inline-block; /* Para que el tamaño se ajuste al contenido */
    }
    .profile img {
        width: 100%; /* Asegúrate de que la imagen ocupe todo el espacio del contenedor */
        height: auto; /* Mantiene la relación de aspecto */
    }
    .edit-button {
        position: absolute; /* Posiciona el botón absolutamente */
        top: 50%; /* Mueve el botón hacia abajo al centro verticalmente */
        left: 50%; /* Mueve el botón hacia la derecha al centro horizontalmente */
        transform: translate(-50%, -62%); /* Centra el botón exactamente en el medio */
        width: 147px; /* Ajusta el ancho del botón */
        height: 147px; /* Ajusta la altura del botón */
        background: url('images/profile-icono-lapiz.png') no-repeat center center; /* Cambia la URL por la de tu ícono */
        background-color:rgba(0,0,0,0.5);
        background-size: 30%; /* Reduce el tamaño del ícono al 50% */
        border: none; /* Sin bordes */
        cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
        transition: background-size 0.3s ease;
    }
    .edit-button:hover{
        background-size: 60%;
        background-color:rgba(0,0,0,0.7)
    }
</style>
</head>
<body>
    <div class="profile-selection">
        <h1>Administrar perfiles</h1>
        <div class="profiles">
            <div class="profile">
                <a href="dashboard/index" data-profile-id="1"><!-- TIENES QUE AVERIGUAR COMO HACER QUE ESTO MANDE EL ID DEL USUARIO AL SIGUIENTE FORM -->
                    <img src="images/profile-predeterminado.png" alt="Usuario">
                </a>
                
                <button class="edit-button" onclick="location.href='{{ route('form-profile') }}'"></button> 
                <div class="profile-name">Usuario que Inicio</div>
            </div>
        </div>
        <div class="manage-profiles">
        <form action="{{ route('select-profile') }}" method="GET" style="display: inline;">
            <button type="submit" class="btn btn-primary">Listo</button>
        </form>
        </div>
    </div>
</body>
</html>

