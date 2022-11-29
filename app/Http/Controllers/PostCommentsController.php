<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostCommentsController extends Controller
{
    public function store(Post $post)
    {
        //add a comment to the given post

        //validation
        request()->validate([
            'body' => 'required|min:3'
        ]);
        //perform an action
        $post->comments()->create([
            'user_id' => request()->user()->id,
            'body' => request('body')

        ]);
        //redirect
        return back()->with('success', 'Comment added!');
    }
}
