<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Perfil</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="#" rel="stylesheet">
    <style>
        /* profile.css */
        body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: #060606;
        }

        .profile-create-container {
            background-color: #161616;
            border: 1px solid #292929; /* Borde gris claro */
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            text-align: center;
        }

        h1, p {
           
            font-weight: 700;
            color: white;
        }
        p{
            margin-bottom: 50px;
        }

        .profile-create-form {
            display: flex;
            flex-direction: column;
            gap: 20px;
        }

        .profile-input-container {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px; /* Separación entre imagen y campo de texto */
        }

        input {
            padding: 15px;
            padding-left: 15px;
            border: 1px solid #555;
            border-radius: 4px;
            font-size: 16px;
            width: 80%; /* Ajuste del tamaño del input */
            background-color: #292929;
            color: white;
        }

        .profile-create-form img {
            max-width: 80px; /* Tamaño reducido de la imagen */
            height: auto;
        }

        .btn {
            padding: 12px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 20px;
            font-weight: 500;
            text-align: center;
            width: 100%;
        }

        .btn-create-profile {
            background-color: white;
            color: black;
            transition: background-color 0.3s; font-size: 
        }

        .btn-create-profile:hover {
            background-color: #bababa;
        }

        .cancel-button {
            margin-top: 10px;
        }

        .btn-cancel {
            padding: 15px;
            border: 1px solid #292929;
            border-radius: 4px;
            color: white;
            background-color: #161616;
            font-weight: 400;
            text-decoration: none;
            display: inline-block;
            width: 100%;
            text-align: center; transition: background-color 0.3s; font-size: 
        }

        .btn-cancel:hover {
            background-color: #292929;
        }

    </style>
</head>
<body>
    <div class="profile-create-container">
        <h1>Agrega un perfil</h1>
        <p>Agrega un perfil para otra persona que ve Netflix</p>
        <form action="{{ route('store-profile') }}" method="POST" class="profile-create-form">
            @csrf
            <div class="profile-input-container">
                <img src="{{asset('images/profile-predeterminado.png')}}" alt="Imagen de perfil predeterminado">
                <input type="text" id="name" name="name" placeholder="Nombre del perfil" required>
            </div>

            <button type="submit" class="btn btn-create-profile">Guardar</button>
            
            <button type="button" class="btn btn-cancel" onclick="window.location.href='{{ route('select-profile') }}'">Cancelar</button>

        </form>
    </div>
</body>
</html>
