<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use App\Mail\WelcomeMail;

class AuthController extends Controller
{
    /**
     * Kullanıcı giriş işlemi
     */
    public function login(Request $request)
    {
        $loginInput = $request->input('email'); // Formda name="email"
        $password = $request->input('password');

        // E-posta mı, telefon mu?
        $loginField = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $loginField => $loginInput,
            'password' => $password,
        ];

        // Giriş başarılıysa yönlendir
        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/');
        }

        // Giriş başarısızsa loginModal açılmalı
        return back()->withInput()->withErrors([
            'email' => 'E-posta / Telefon veya şifre hatalı.',
        ])->with('modal', 'loginModal');
    }

    /**
     * Kullanıcı çıkışı
     */
    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }

    /**
     * Kullanıcı kayıt işlemi
     */
    public function register(Request $request)
    {
        $request->merge([
            'phone' => '+90' . preg_replace('/\D/', '', $request->phone),
        ]);
        $validated = $request->validate([
            'first_name'         => 'required|string|max:100',
            'last_name'          => 'required|string|max:100',
            'email'              => 'required|email|unique:users,email',
            'phone'              => 'required|string|max:20',
            'tc_no'              => 'required|string|size:11|unique:users,tc_no',
            'birth_date'         => 'required|date|before:-18 years',
            'password'           => 'required|string|min:6|confirmed',
            'contract_accepted'  => 'required|accepted',
        ]);

        // Gerçek T.C. Kimlik doğrulama yapılmak istenirse buraya eklenir
        $dogrulandi = true; // simülasyon

        if (!$dogrulandi) {
            return back()
                ->withInput()
                ->withErrors(['tc_no' => 'T.C. Kimlik doğrulaması başarısız.'])
                ->with('modal', 'registerModal');
        }

        // Kullanıcı kaydı oluştur
        $user = User::create([
            'first_name'        => $validated['first_name'],
            'last_name'         => $validated['last_name'],
            'email'             => $validated['email'],
            'phone'             => $validated['phone'],
            'tc_no'             => $validated['tc_no'],
            'birth_date'        => $validated['birth_date'],
            'password'          => Hash::make($validated['password']),
            'role'              => 'user',
            'contract_accepted' => true,
        ]);

        // Kullanıcıyı giriş yapmış olarak ayarla
        Auth::login($user);

        // Hoş geldiniz e-postası gönder
        Mail::to($user->email)->send(new WelcomeMail($user));

        return redirect()->intended('/');
    }
}
