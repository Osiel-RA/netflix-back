<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Payment;

class CheckActivePlan
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Verificar si el usuario tiene un pago activo dentro de los últimos 30 días
            $payment = Payment::where('user_id', $user->id)
                ->orderBy('created_at', 'desc')
                ->first();

            if (!$payment || $payment->created_at->diffInDays(now()) > 30) {
                // Redirigir a la selección de plan si el plan ha expirado o no existe
                return redirect()->route('membership.select-plan')
                    ->with('status', 'Tu plan ha expirado. Selecciona uno nuevo para continuar.');
            }
        }

        // Continuar con la solicitud si tiene un plan activo
        return $next($request);
    }
}
