<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlanType;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class PaymentController extends Controller
{
    
    public function showCodePay()
    {
        // Obtener el plan Estándar
        $plan_standard = PlanType::where('name', 'Estándar con Anuncios')->first();

        return view('code-pay', compact('plan_standard'));
    }

    public function redeemCode(Request $request)
    {
        
        // Validar el código ingresado
        $request->validate([
            'code' => 'required|string|min:5|max:10',
            'plan_type_id' => 'required|exists:plan_type,id',
        ]);

        // Simular la validación del código (puedes agregar lógica real más tarde)
        if ($request->code !== '101112') {
            return redirect()->back()->withErrors(['code' => 'El código no es válido']);
        }

        // Crear el registro de pago en la tabla payment
        Payment::create([
            'user_id' => Auth::id(),
            'pay_method_id' => 3, // 3 para "Tarjeta de Regalo" (ajústalo según el id real)
            'plan_type_id' => $request->plan_type_id,
        ]);

        return redirect()->route('login')->with('success', 'Pago realizado exitosamente');
    }

}
