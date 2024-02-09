<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        return view('Admin.comment.index', [
            'comments' => $request->user()->comments()->withoutGlobalScope('moderated')->paginate(),
        ]);
    }

    public function edit(Comment $comment)
    {
        return view('Admin.comment.edit', [
            'comment' => $comment,
        ]);
    }
}
