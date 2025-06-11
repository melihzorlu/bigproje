<?php
// app/Http/Controllers/BlogController.php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // Blog listesi
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('pages.blog', compact('blogs')); // view yolunu senin yapına uygun belirttim
    }

    // Tekil blog sayfası
    public function show($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();

        // Diğer blogları getir, ancak şu anki gösterileni hariç tut
        $otherBlogs = Blog::where('slug', '!=', $slug)->latest()->take(10)->get();

        return view('pages.blog-detail', compact('blog', 'otherBlogs'));
    }

}
