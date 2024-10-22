{{-- resources/views/redeem-code.blade.php --}}
@extends('layouts.pay-layout')

@section('content')
    <!-- Step Header -->
    <div class="step-header text-center">
        <h7>PASO 4 DE 4</h7>
        <h2>Registrar codigo</h2>
    </div>

    <!-- Formulario para ingresar el código de tarjeta de regalo -->
    <div class="payment-form">
        <form action="{{ route('redeem.code') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="code">Ingrese su código de pre-pago:</label>
                <input type="text" name="code" id="code" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="plan_type">Seleccione un plan:</label>
                <select name="plan_type_id" id="plan_type" class="form-control">
                    <option value="{{ $plan_standard->id }}">{{ $plan_standard->name }} ({{ $plan_standard->import }} MXN)</option>
                </select>
            </div>

            <button type="submit" class="btn btn-danger btn-block">Canjear</button>
        </form>
    </div>

    <!-- Manejo de errores -->
    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Mensaje de éxito -->
    @if (session('success'))
        <div class="alert alert-success mt-3">
            <p>{{ session('success') }}</p>
        </div>
    @endif
@endsection
