<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Blog extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public static function scopeFilter($blogsQuery, $filters = [])
    {
        if ($search = $filters['search'] ?? null) {
            $blogsQuery
                ->where(function ($query) use ($search) {
                    $query->where('title', 'LIKE', '%' . $search . '%')
                        ->orWhere('intro', 'LIKE', '%' . $search . '%');
                });
        }

        if ($category = $filters['category'] ?? null) {
            $blogsQuery
                ->whereHas('category', function ($query) use ($category) {
                    $query->where('slug', $category);
                });
        }

        if ($username = $filters['author'] ?? null) {
            $blogsQuery->whereHas('user', function ($query) use ($username) {
                $query->where('username', $username);
            });
        }
    }
}
