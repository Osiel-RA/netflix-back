<!-- resources/views/pay.blade.php -->
@extends('layouts.pay-layout')

@section('content')
    <!-- Step Header -->
    <div class="step-header text-center">
        <img src="{{ asset('images/pay-icono-candado.png') }}" alt="Icon" class="header-icon">
        <h7>PASO 4 DE 4</h7>
        <h2>Elige cómo quieres pagar</h2>
        <p>Tu forma de pago está encriptada y puedes cambiarla cuando quieras.</p>
        <p class="security-note">Transacciones seguras y confiables.<br> Cancela fácilmente online.</p>
    </div>

    <!-- Payment Options -->
    <div class="payment-options">
        <button class="btn btn-light btn-block payment-btn">
            Tarjeta de crédito o débito 
            <img src="{{ asset('images/pay-metodos.png') }}" alt="Tarjeta" class="btn-icon1">
            <span class="arrow">&gt;</span>
        </button>

        <button class="btn btn-light btn-block payment-btn">
            OXXO PAY
            <img src="{{ asset('images/pay-metodos-oxxo.png') }}" alt="OXXO" class="btn-icon2"> 
            <span class="arrow">&gt;</span>
        </button>

        <form action="{{ route('code-pay') }}" method="GET">
            <button type="submit" class="btn btn-light btn-block payment-btn">
                Código de regalo
                <img src="{{ asset('images/pay-metodos-netflix.png') }}" alt="Código de regalo" class="btn-icon3">
                <span class="arrow">&gt;</span>
            </button>
        </form>
    </div>
@endsection
