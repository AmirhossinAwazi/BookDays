<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index(Request $request)
    {
        return view('Admin.comment.index', [
            'comments' => $request->user()->comments()->withoutGlobalScope('moderated')->paginate(),
        ]);
    }
}
