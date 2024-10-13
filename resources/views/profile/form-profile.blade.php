<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar perfil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="{{ asset('css/profile-form.css') }}" rel="stylesheet">
</head>
<body>
    <div class="profile-edit">
        <h1>Editar perfil</h1>
        <form action="" method="" class="profile-form">
            @csrf
            <table class="profile-table">
                <!-- Profile Picture and Name -->
                <tr>
                    <td class="label-cell" rowspan="5">
                        <img src="images/profile-predeterminado.png" alt="Foto de perfil" class="profile-picture">
                        <!-- !!!!!!!necesita un boton para editar la foto, pero se hara en el sprint 2 --->
                    </td>
                    <td class="input-cell">
                        <input type="text" id="profile-name" name="profile_name" value="Nombre del perfil" class="input-field">
                    </td> 
                </tr>
                <!-- Language Selection -->
                <tr>
                    <td class="input-cell" colspan="2">
                        <p>Idioma:</p>
                        <select id="language" name="language" class="select-field">
                            <option value="español" selected>Español</option>
                            <option value="english">Inglés</option>
                        </select>
                    </td>
                </tr>
                
                <!-- Game Alias -->
                <tr>
                    <td class="input-cell" colspan="2">
                    <p>Alias de juegos:</p>
                        <input type="text" id="game-alias" name="game_alias" class="input-field" disabled placeholder="Crear alias de juegos">
                        <small>Tu alias es un nombre único que se usará para jugar con otros miembros de Netflix en Juegos.</small>
                    </td>
                </tr>
                <!-- Age Settings -->
                <tr>
                    <td class="input-cell" colspan="2">
                        <p>Configuración por edad:</p>
                        <select name="age_rating" class="select-field">
                            <option value="todas" selected>Todas las clasificaciones por edad</option>
                            <option value="infantil">Infantil</option>
                        </select>
                    </td>
                </tr>
                <!-- Auto-Play Controls -->
                <tr>
                    <td class="input-cell" colspan="2">
                        <p>Controles de reproducción automática:</p>
                        <div class="checkbox">
                            <input type="checkbox" id="auto-play-next" name="auto_play_next" checked>
                            <label for="auto-play-next">Reproducir automáticamente el siguiente episodio en todos los dispositivos.</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" id="auto-play-trailers" name="auto_play_trailers" checked>
                            <label for="auto-play-trailers">Se reproducen automáticamente los avances mientras navegas.</label>
                        </div>
                    </td>
                </tr>
            </table>
            <!-- Save and Cancel Buttons -->
            <div class="button-section">
                
                <button type="submit" class="btn-save"><strong>Guardar</strong></button>
                <button type="button" class="btn-cancel" onclick="location.href='{{ route('select-profile') }}'"><strong>Cancelar</strong></button> <!--- ESTE SI SE QUEDA ASI --->
            </div>
        </form>
    </div>
</body>
</html>
