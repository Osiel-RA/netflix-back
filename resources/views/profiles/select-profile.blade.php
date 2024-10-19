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
            @foreach($profiles as $profile)
                <div class="profile">
                    <a href="/home" data-profile-id="{{ $profile->id }}">
                        <img src="{{ $profile->image_url ?? asset('images/profile-predeterminado.png') }}" alt="Usuario">
                    </a>
                    <div class="profile-name">{{ $profile->name }}</div>
                </div>
            @endforeach
        </div>

        <div class="manage-profiles">
            <!-- Botón para ver perfiles existentes -->
            <form action="{{ route('profiles.index') }}" method="GET" style="display: inline;">
                <button type="submit" class="btn btn-success">Administrar perfiles</button>
            </form>
        </div>
    </div>
</body>
</html>
