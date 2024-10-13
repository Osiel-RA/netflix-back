<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Perfil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/profile.css') }}" rel="stylesheet">
</head>
<body>
    <div class="profile-selection">
        <h1>¿Quién está viendo ahora?</h1>
        <div class="profiles">
            <div class="profile">
                <a href="/home" data-profile-id="1"> <!-- manda al index | El ID del perfil -->
                    <img src="images/profile-predeterminado.png" alt="Usuario"><!-- imangen del perfil, sino tiene ps que mande una predeterminada -->
                </a>
                <div class="profile-name">Usuario que Inicio</div>
            </div>
            <div class="profile"><!-- deben aparecer todos los perfiles relacionadas al usuario, por ahora los meteremos manualmente a la base de datos porque no esta para este sprint hacer el editar perfil -->
                <a href="/home" data-profile-id="2">
                    <img src="images/profile-predeterminado.png" alt="Usuario">
                </a>
                <div class="profile-name">otro perfil</div>
            </div>
            <div class="profile">
                <a href="/home" data-profile-id="3">
                    <img src="images/profile-predeterminado.png" alt="Usuario">
                </a>
                <div class="profile-name">otro perfil</div>
            </div>
            <div class="profile">
                <a href="/home" data-profile-id="4">
                    <img src="images/profile-predeterminado.png" alt="Usuario">
                </a>
                <div class="profile-name">otro perfil</div>
            </div>
        </div>
        <div class="manage-profiles">
        <form action="{{ route('edit-profile') }}" method="GET" style="display: inline;">
            <button type="submit" class="btn btn-primary">Administrar perfiles</button>
        </form>
        </div>
    </div>
</body>
</html>
