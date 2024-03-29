<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateCommentRequest;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        return view('Admin.comment.index', [
            'comments' => auth()->user()->comments()->withoutGlobalScope('moderated')->paginate(),
        ]);
    }

    public function edit(Comment $comment)
    {
        return view('Admin.comment.edit', [
            'comment' => $comment,
        ]);
    }

    public function update(UpdateCommentRequest $request, Comment $comment)
    {
        $comment->update($request->validated());

        return to_route('comment.index');
    }

    public function moderate(Request $request, Comment $comment)
    {
        $comment->moderated_at = $comment->moderated_at ? null : now();
        $comment->save();

        return to_route('comment.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();

        return to_route('comment.index');
    }

}
