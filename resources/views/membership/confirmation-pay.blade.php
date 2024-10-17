{{-- resources/views/selecciona-plan.blade.php --}}
@extends('layouts.pay-layout')

@section('content')
    <!-- Step Header -->
    <div class="step-header text-center">
        <img src="{{ asset('images/plan-palomitarojaciruclo.png') }}" alt="Dispositivos" width="250">
        <h7>¡Listo!</h7>
        <h2>¡Bienvenido a Netflix!</h2>
        
            <p>
                Haz elegido el plan {{ $plan_standard->name }}
            </p>
            <p>
                Ve contenido hasta con {{ $plan_standard->devices }} dispositivos a la vez
            </p>
            <p>
            ¡La suscripción dura un mes! Disfruta de todo el contenido.
            </p>
        
    </div>

    <!-- Action Button -->
    <a href="{{ route('profiles.select') }}" class="btn btn-danger btn-block btn-next">Entrar a Netflix</a>
@endsection
