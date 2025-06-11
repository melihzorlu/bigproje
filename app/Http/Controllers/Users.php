<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Users extends Controller
{

    public function index(){
        $users = User ::latest()->get();
        return view('pages.profile', compact('users'));
    }
}
