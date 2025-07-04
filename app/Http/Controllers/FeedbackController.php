<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class FeedbackController extends Controller
{
    public function send(Request $request)
    {
        $request->validate([
            'feedback_message' => 'required|string|max:1000'
        ]);

        Mail::raw($request->feedback_message, function ($message) {
            $message->to('firmacv2025@gmail.com')
                ->subject('FirmaCV Geri Bildirim');
        });

        return redirect()->route('home')->with('success', 'Geri bildiriminiz başarıyla gönderildi.');
    }
}
