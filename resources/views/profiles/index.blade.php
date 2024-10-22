<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Perfiles</title>
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
    <style>
    .profile {
        position: relative; /* Habilita el posicionamiento relativo para el contenedor */
        display: inline-block; /* Para que el tamaño se ajuste al contenido */
        
    }
    .profile img {
        width: 100%; /* Asegúrate de que la imagen ocupe todo el espacio del contenedor */
        height: auto; /* Mantiene la relación de aspecto */
        border-radius: 15px;
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
        border-radius: 9px;
    }
    .edit-button:hover{
        background-size: 60%;
        background-color:rgba(0,0,0,0.7)
    }
    .plus-button {
        position: absolute; /* Posiciona el botón absolutamente */
        top: 50%; /* Mueve el botón hacia abajo al centro verticalmente */
        left: 50%; /* Mueve el botón hacia la derecha al centro horizontalmente */
        transform: translate(-50%, -62%); /* Centra el botón exactamente en el medio */
        width: 147px; /* Ajusta el ancho del botón */
        height: 147px; /* Ajusta la altura del botón */
        background: url('images/profile-icono-plus.png') no-repeat center center; /* Cambia la URL por la de tu ícono */
        background-color:rgba(0,0,0,0.5);
        background-size: 60%; 
        border: none; /* Sin bordes */
        cursor: pointer; /* Cambia el cursor al pasar sobre el botón */
        transition: background-size 0.3s ease;
        border-radius: 9px;
    }
    .plus-button:hover{
        background-size: 60%;
        background-color:rgba(255,255,255,0.5)
    }
    .agg{
        position: absolute; /* Posiciona el botón absolutamente */
        top: 82%; /* Mueve el botón hacia abajo al centro verticalmente */
        left: 15%;
    }

</style>
</head>
<body>
    <div class="profile-selection">
        <h1>Administrar perfiles</h1>
        <div class="profiles">
            @foreach($profiles as $profile)
                <div class="profile">
                    <img src="{{ $profile->image_url ?? asset('images/profile-predeterminado.png') }}" alt="{{ $profile->name }}">
                    <div class="profile-name">{{ $profile->name }}</div>                 
                    <button class="edit-button" onclick="location.href='{{ route('profiles.edit', $profile->id) }}'"></button> 
                </div>
            @endforeach
            <div class="profile">
            <form action="{{  route('create-profile') }}" method="GET" style="display: inline;">
                
                <div class="profile-name agg">Agregar perfil</div>   
                <button  class="plus-button" type="submit" class="btn btn-success"></button>
            </form>
            </div>
        </div>

        <!-- Botón para crear nuevo perfil con el mismo estilo -->
        <br>
       
        <div class="manage-profiles">
            <form action="{{ route('select-profile') }}" method="GET" style="display: inline;">
                <button type="submit" class="btn btn-success listo">Listo</button>
            </form>  
        </div>
    </div>
</body>
</html>
