<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::with(['category', 'user'])
                ->filter(request(['search', 'category', 'author']))
                ->latest()->paginate()
                ->withQueryString(),
        ]);
    }

    public function show (Blog $blog) {
        return view('blogs.show', [
            'blog' => $blog,
            'randomBlogs' => BLog::inRandomOrder()->take(3)->get()
        ]);
    }
}
