<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\TcDogrulamaHelper;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/');
        }
        return back()->withErrors(['email' => 'Giriş bilgileri hatalı.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    public function register(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'last_name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|string|max:20',
            'tc_no' => 'required|string|size:11',
            'birth_date' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Gerçek doğrulama entegre edilecekse buraya
        $dogrulandi = true;

        if (!$dogrulandi) {
            return back()->withErrors(['tc_no' => 'T.C. Kimlik doğrulaması başarısız.']);
        }

        $user = \App\Models\User::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'tc_no' => $validated['tc_no'],
            'birth_date' => $validated['birth_date'],
            'password' => \Hash::make($validated['password']),
            'role' => 'user',
        ]);

        // Otomatik giriş yap
        \Auth::login($user);

        // Anasayfaya yönlendir
        return redirect()->intended('/');
    }
}
