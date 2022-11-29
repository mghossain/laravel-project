<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $with = ['author'];

    public function post() // we don't write 'post_id' since the met name is post(
    {
        return $this->belongsTo(Post::class);
    }

    public function author() // laravel thinks it's author_id but it's user_id
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
