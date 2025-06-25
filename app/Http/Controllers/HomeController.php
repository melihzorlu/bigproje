<?php
namespace App\Http\Controllers;

use App\Models\Complaint;  // Burada Complaint modelini kullan
use App\Models\ComplaintCategory;

class HomeController extends Controller
{
    public function index()
    {
        $complaints = Complaint::latest()->take(10)->get();  // En son 10 şikayeti çek
        return view('pages.home', compact('complaints'));
    }
}
