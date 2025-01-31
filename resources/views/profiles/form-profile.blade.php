<!-- form-profile.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>
    <link href="{{ asset('css/profile-form.css') }}" rel="stylesheet">
</head>
<style>
    .red {
        margin-left: 10px;
    }
</style>
<body>
    <div class="profile-edit">
        <h1>Editar perfil</h1>
        <form action="{{ route('profiles.update', $profile->id) }}" method="POST" class="profile-create-form">
            @csrf
            @method('PUT')
            <table class="profile-table">
               <!-- Profile Picture and Name -->
<tr>
    <td class="label-cell" rowspan="5">
        <a href="{{ route('select-profile-image', $profile->id) }}">
            <img src="{{ asset($profile->image_url ?: 'images/profile-predeterminado.png') }}" alt="Foto de perfil" class="profile-picture" onclick="window.location.href='{{ route('select-profile-image', $profile->id) }}'">
        </a>
    </td>
    <td class="input-cell">
        <input type="text" name="name" id="name" value="{{ $profile->name }}" class="input-field" required>
    </td> 
</tr>

                <!-- Language Selection -->
                <tr>
                    <td class="input-cell" colspan="2">
                        <p>Idioma:</p>
                        <select name="language_id" class="select-field">
                            @foreach($languages as $language)
                              <option value="{{ $language->id }}" {{ $profile->language_id == $language->id ? 'selected' : '' }}>{{ $language->name }}</option>
                            @endforeach
                       </select>
                     </td>
                </tr>

                <!-- Game Alias -->
                <tr>
                    <td class="input-cell" colspan="2">
                        <p>Alias de juegos:</p>
                        <input type="text" class="input-field" disabled placeholder="Crear alias de juegos">
                        <small>Tu alias es un nombre único que se usará para jugar con otros miembros de Netflix en Juegos.</small>
                    </td>
                </tr>
                <!-- Age Settings -->
                <tr>
                    <td class="input-cell" colspan="2">
                        <p>Configuración por edad:</p>
                        <select class="select-field" disabled>
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
                            <input type="checkbox" checked disabled>
                            <label for="auto-play-next">Reproducir automáticamente el siguiente episodio en todos los dispositivos.</label>
                        </div>
                        <div class="checkbox">
                            <input type="checkbox" checked disabled>
                            <label for="auto-play-trailers">Se reproducen automáticamente los avances mientras navegas.</label>
                        </div>
                    </td>
                </tr>
            </table>

            <!-- Save and Cancel Buttons -->
            <div class="button-section">
                <button type="submit" class="btn-save"><strong>Guardar</strong></button>
                <button type="button" class="btn-cancel" onclick="location.href='{{ route('profiles.index') }}'"><strong>Cancelar</strong></button>
                <button type="button" class="btn-cancel red" id="deleteProfileBtn"><strong>Eliminar perfil</strong></button>
            </div>
        </form>
    </div>

    <!-- Formulario oculto para eliminar perfil -->
    <form id="deleteProfileForm" action="{{ route('profiles.destroy', $profile->id) }}" method="POST" style="display: none;">
        @csrf
        @method('DELETE')
    </form>

    <script>
        const deleteProfileBtn = document.getElementById('deleteProfileBtn');
        const deleteProfileForm = document.getElementById('deleteProfileForm');

        deleteProfileBtn.addEventListener('click', function() {
            if (confirm('¿Estás seguro de que deseas eliminar el perfil?')) {
                deleteProfileForm.submit(); // Envía el formulario oculto
            }
        });
    </script>
</body>
</html>
