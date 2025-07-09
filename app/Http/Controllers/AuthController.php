<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use App\Helpers\TcDogrulamaHelper;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $loginInput = $request->input('email'); // formda name="email" olarak geliyor
        $password = $request->input('password');

        // E-posta mı telefon mu?
        $loginField = filter_var($loginInput, FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $loginField => $loginInput,
            'password' => $password,
        ];

        if (Auth::attempt($credentials, $request->filled('remember'))) {
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'E-posta / Telefon veya şifre hatalı.',
        ]);
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
            'tc_no' => 'required|string|size:11|unique:users,tc_no',
            'birth_date' => 'required|date|before:-18 years',
            'password' => 'required|string|min:6|confirmed',
            'contract_accepted' => 'required|accepted',
        ]);

        // Gerçek TC kimlik doğrulaması varsa buraya entegre edilir
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
            'contract_accepted' => true,
        ]);

        \Auth::login($user);

        \Mail::to($user->email)->send(new \App\Mail\WelcomeMail($user));

        return redirect()->intended('/');
    }
}
