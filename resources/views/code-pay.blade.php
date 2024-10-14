<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de pago con código de tarjeta de regalo</title>
</head>
<body>
    <h1>Pago por código de tarjeta de regalo</h1>

    <form action="{{ route('redeem.code') }}" method="POST">
        @csrf
        <label for="code">Ingrese su código de pre-pago:</label>
        <input type="text" name="code" id="code" required>

        <label for="plan_type">Seleccione un plan:</label>
        <select name="plan_type_id" id="plan_type">
            <option value="{{ $plan_standard->id }}">{{ $plan_standard->name }} ({{ $plan_standard->import }} MXN)</option>
        </select>

        <button type="submit">Canjear</button>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('success'))
        <div>
            <p>{{ session('success') }}</p>
        </div>
    @endif
</body>
</html>
