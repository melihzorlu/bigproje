<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Complaint;
use App\Models\Comment;

class ProfileController extends Controller
{
    // Ana profil sayfası: Profili Düzenle kısmı varsayılan olarak açık
    public function index()
    {
        $user = Auth::user();
        $complaints = $user->complaints;
        $comments = $user->comments;

        return view('pages.profile.index', compact('user', 'complaints', 'comments'))
            ->with('showEdit', true);
    }

    // Kullanıcı bilgilerini güncelleme işlemi
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'nullable|string|max:20',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;

        if ($request->filled('password')) {
            $user->password = bcrypt($request->password);
        }

        $user->save();

        return redirect()->back()->with('success', 'Bilgileriniz başarıyla güncellendi.');
    }

    // Kullanıcının deneyimleri (şikayetleri)
    public function experiences()
    {
        $user = Auth::user();
        $experiences = $user->complaints;

        return view('pages.profile.experiences', compact('user', 'experiences'))
            ->with('showEdit', false);
    }

    // Kullanıcının yaptığı yorumlar
    public function comments()
    {
        $user = Auth::user();
        $comments = $user->comments;

        return view('pages.profile.comments', compact('user', 'comments'))
            ->with('showEdit', false);
    }
}
