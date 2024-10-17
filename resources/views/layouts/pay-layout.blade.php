<!-- resources/views/layouts/pay-layout.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pago - Netflix</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/select-pay-styles.css') }}">
</head>
<body>

    <!-- White Navbar Component -->
    @include('components.white-navbar')

    <!-- Main Content (Will be provided by the page content) -->
    <div class="main-container">
        @yield('content')
    </div>

    <!-- White Footer Component -->
    @include('components.white-footer')

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>