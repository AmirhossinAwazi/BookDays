<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function show(User $user, Post $post)
    {

        $post->incrementReadCount();

        $tags = Tag::WhereHas('posts', function($query) use($user) {
            $query->where('author_id', $user->id);
        })->get();

        return view('blog.show', compact('post'),
        [
            'comments' => $post->comments,
            'post' => $post,
            'blog' => $user,
            'tags' => $tags,
            'categories' => $user->categories,
        ]);
    }
}
