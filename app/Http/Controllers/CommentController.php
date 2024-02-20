<?php

namespace App\Http\Controllers;

use App\Events\NewComment;
use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $Request, User $user,Post $post, Comment $comment)
    {
        $comment = $post->comments()->create($Request->validated());

        NewComment::dispatch($comment);

        return back()
            ->with('comment-created', 'Your comment awaits moderation. Thanks!')
            ->withFragment('comments');
    }
}
