<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Contraseña</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Arial, sans-serif;
            background-color: #ffffff;
            color: #ffffff;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #181818;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);
        }
        .header {
            background-color: #000000;
            padding: 20px;
            text-align: center;
        }
        .header img {
            width: 120px;
        }
        .content {
            padding: 40px 30px;
            text-align: center;
        }
        h1 {
            font-size: 28px;
            margin-bottom: 20px;
            color: #ffffff;
        }
        p {
            font-size: 16px;
            color: #b3b3b3;
            line-height: 1.6;
        }
        .button {
            display: inline-block;
            background-color: #e50914;
            color: #ffffff;
            padding: 15px 30px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 18px;
            margin-top: 30px;
        }
        .button:hover {
            background-color: #f40612;
        }
        .footer {
            background-color: #141414;
            padding: 20px;
            text-align: center;
            font-size: 14px;
            color: #b3b3b3;
        }
        .footer a {
            color: #b3b3b3;
            text-decoration: none;
        }
        .footer a:hover {
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- Encabezado con logo -->
        <div class="header">
            <img src="https://1000marcas.net/wp-content/uploads/2020/01/Logo-Netflix.png" alt="Netflix Logo">
        </div>

        <!-- Contenido principal -->
        <div class="content">
            <h1>Cambio de Contraseña Solicitado</h1>
            <p>Hola,</p>
            <p>Recibimos una solicitud para cambiar tu contraseña. Si no realizaste esta solicitud, puedes ignorar este mensaje. De lo contrario, haz clic en el botón a continuación para proceder con el cambio de tu contraseña.</p>
            <a href="{{ route('reset-password', $token) }}" class="button">Cambiar Contraseña</a>
        </div>

        <!-- Pie de página -->
        <div class="footer">
            <p>Si no solicitaste este cambio, por favor asegúrate de proteger tu cuenta. <br>Visita el <a href="#">Centro de Ayuda</a> para más información.</p>
        </div>
    </div>
</body>
</html>