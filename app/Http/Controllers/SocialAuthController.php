<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Str;

class SocialAuthController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        $socialUser = Socialite::driver($provider)->user();

        $user = User::firstOrCreate(
            ['email' => $socialUser->getEmail()],
            [
                'first_name' => $socialUser->getName(),
                'last_name' => '',
                'email' => $socialUser->getEmail(),
                'password' => bcrypt(Str::random(16)),
                'tc_no' => '00000000000',
                'birth_date' => now()->subYears(18),
                'role' => 'user',
            ]
        );

        Auth::login($user);
        return redirect()->intended('/');
    }
}
