<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cambio de Contraseña</title>
</head>
<body style="font-family: 'Helvetica Neue', Arial, sans-serif; background-color: #ffffff; color: #ffffff; margin: 0; padding: 0;">
    <div style="max-width: 600px; margin: 50px auto; background-color: #181818; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.5);">
        <!-- Encabezado con logo -->
        <div style="background-color: #000000; padding: 20px; text-align: center;">
            <img src="{{ asset('images/logo-netflix.png') }}" alt="Netflix Logo" style="width: 120px;">
        </div>

        <!-- Contenido principal -->
        <div style="padding: 40px 30px; text-align: center;">
            <h1 style="font-size: 28px; margin-bottom: 20px; color: #ffffff;">Cambio de Contraseña Solicitado</h1>
            <p style="font-size: 16px; color: #b3b3b3; line-height: 1.6;">Hola,</p>
            <p style="font-size: 16px; color: #b3b3b3; line-height: 1.6;">Recibimos una solicitud para cambiar tu contraseña. Si no realizaste esta solicitud, puedes ignorar este mensaje. De lo contrario, haz clic en el botón a continuación para proceder con el cambio de tu contraseña.</p>
            <a href="{{ route('reset-password', ['token' => $token, 'email' => $email]) }}" style="display: inline-block; background-color: #e50914; color: #ffffff; padding: 15px 30px; text-decoration: none; border-radius: 5px; font-size: 18px; margin-top: 30px;">Cambiar Contraseña</a>
        </div>

        <!-- Pie de página -->
        <div style="background-color: #141414; padding: 20px; text-align: center; font-size: 14px; color: #b3b3b3;">
            <p style="font-size: 14px; color: #b3b3b3;">Si no solicitaste este cambio, por favor asegúrate de proteger tu cuenta. <br>Visita el <a href="#" style="color: #b3b3b3; text-decoration: none;">Centro de Ayuda</a> para más información.</p>
        </div>
    </div>
</body>
</html>
