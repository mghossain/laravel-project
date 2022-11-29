<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author', 'comments'];

    public function scopeFilter($query, array $filters)     
    {

        $query->when($filters['search'] ?? false, fn($query, $search) =>
                   // Post::newQuery()->filter()
            $query->where(fn ($query) =>
                $query->where('title', 'like', '%'.$search.'%')
                    ->orwhere('body', 'like', '%'.$search.'%')
                )
            );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
                 // Post that have a specific category associated with the category slug
            $query
                ->whereHas('category', fn($query) => 
                    $query
                        ->where('slug', $category))
            );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
                 // Post that have a specific author associated with the author username
            $query
                ->whereHas('author', fn($query) => 
                    $query
                        ->where('username', $author))
            );

    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}
