<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email_or_phone' => 'required|string',
            'password' => 'required|string|min:6',
        ]);

        // Giriş bilgileri e-posta veya telefon olabilir
        $loginField = filter_var($credentials['email_or_phone'], FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        if (Auth::attempt([$loginField => $credentials['email_or_phone'], 'password' => $credentials['password']], $request->remember)) {
            $request->session()->regenerate();
            return redirect()->intended('/')->with('success', 'Giriş başarılı!');
        }

        return back()->withErrors([
            'email_or_phone' => 'Giriş bilgileri hatalı.',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('success', 'Çıkış yapıldı.');
    }
}
