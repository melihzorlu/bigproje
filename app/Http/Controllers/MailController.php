<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\PersonMail;
use App\Mail\CompanyMail; // <-- Bu satır eksikti

class MailController extends Controller
{
    public function sendPersonMail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:500',
        ]);

        $details = [
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
        ];

        Mail::to('firmacv2025@gmail.com')->send(new PersonMail($details));

        return redirect()->back()->with('success', 'Mesajınız gönderildi.');
    }

    public function sendCompanyMail(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|max:100',
            'phone' => 'required|string|max:20',
            'subject' => 'required|string|max:100',
            'message' => 'required|string|max:500',
        ]);

        Mail::to('firmacv2025@gmail.com')->send(new CompanyMail($validated));

        return redirect()->back()->with('success', 'Mesajınız gönderildi.');
    }
}
