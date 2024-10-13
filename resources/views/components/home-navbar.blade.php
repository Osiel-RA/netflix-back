<!-- HOME
Propósito: Esta vista es la barra de navegación de la página principal.
Contenido: Contiene enlaces de navegación a diferentes secciones de la aplicación, incluyendo inicio, series, películas y opciones de perfil de usuario.
-->
<nav class="navbar navbar-expand-lg">
    <a class="navbar-brand" href="#">
        <img src="{{ asset('https://upload.wikimedia.org/wikipedia/commons/7/7a/Logonetflix.png') }}" alt="Netflix Logo" class="logo">
    </a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item"><a class="nav-link" href="#">Inicio</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Series</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Películas</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Novedades populares</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Mi lista</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Explora por idiomas</a></li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Buscar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Notificaciones</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Perfil
                </a>
                <div class="dropdown-menu" aria-labelledby="profileDropdown">
                    <a class="dropdown-item" href="#">Administrar perfil</a>
                    <a class="dropdown-item" href="#">Cuenta</a>
                    <form action="{{ route('logout') }}" method="POST" style="display:inline;">
                        @csrf <!-- Asegúrate de incluir el token CSRF -->
                        <button type="submit" class="dropdown-item" style="border: none; background: none; padding: 0; cursor: pointer;">
                            Cerrar sesión
                        </button>
                    </form>
                </div>
            </li>
        </ul>
    </div>
</nav>