<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Blog;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Blog $blog, CommentRequest $request)
    {
        $blog->comments()->create([
            'body' => request('body'),
            'user_id' => auth()->user()->id,
        ]);

        return back();
    }

    public function destroy(Blog $blog, Comment $comment)
    {
        $comment->delete();
        return redirect('/blogs/' . $blog->slug);
    }

    public function edit(Blog $blog, Comment $comment)
    {
        return view('comments.edit', [
            'blog' => $blog,
            'comment' => $comment
        ]);
    }

    public function update(Blog $blog, Comment $comment, CommentRequest $request)
    {
        $comment->body = request('body');
        $comment->save();
        return redirect('/blogs/' . $blog->slug);
    }
}
