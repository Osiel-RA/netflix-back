<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller {
    public function forgetPassword() {
        return view('auth.email-forgot-password');
    }

    public function forgetPasswordPost(Request $request) {
        $request->validate([
            'email'=> 'required|email'
        ]);

        $token= Str::random(64);

        DB::table('password_reset_token')->insert([
            'username'=> $request->email,
            'token'=> $token,
            'created_at'=> Carbon::now()
        ]);

        Mail::send('auth/emails/forget-password', ['token'=> $token], function($message) use ($request) {
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return redirect()->to(route('forget-password'));
    }

    public function resetPassword($token) {
        return view('auth.forgot-password', compact('token'));
    }

    public function resetPasswordPost(Request $request) {
        $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:8|confirmed',
            'password_confirmation'=> 'required|min:8'
        ]);

        $updatePassword= DB::table('password_reset_token')->where([
            'username'=> $request->email,
            'token'=> $request->token
        ])->first();

        if (!$updatePassword) {
            return redirect()->to(route('reset-password'));
        }

        User::where('username', $request->email)->update(['password'=> Hash::make($request->password)]);

        DB::table('password_reset_token')->where(['username'=> $request->email])->delete();

        return redirect()->to(route('login-user'));
    }
}
