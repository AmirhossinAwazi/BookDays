<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $Request, User $user,Post $post, Comment $comment)
    {
        $post->comments()->create($Request->validated());

        return back()
            ->with('comment-created', 'Your comment awaits moderation. Thanks!')
            ->withFragment('comments');
    }
}
