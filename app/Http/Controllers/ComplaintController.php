<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::latest()->get();
        return view('pages.complaint', compact('complaints'));
    }

    public function show($slug)
    {
        $complaint = Complaint::where('slug', $slug)->firstOrFail();
        return view('pages.complaint-detail', compact('complaint'));
    }



}
