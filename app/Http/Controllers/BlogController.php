<?php

namespace App\Http\Controllers;

use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::with(['category', 'user'])        // eager loading
                ->filter(request(['search', 'category', 'author']))
                ->latest()
                ->paginate()
                ->withQueryString(),
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
            'randomBlogs' => cache()->remember(
                'blogs.' . $blog->slug,
                now()->addMinute(2),
                function () use ($blog) {
                    return Blog::inRandomOrder()->whereHas('category', function ($query) use ($blog) {
                        $query->where('slug', $blog->category->slug);
                    })->take(3)->get();
                }
            )
        ]);
    }
}
