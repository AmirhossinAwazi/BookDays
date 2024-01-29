<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(User $user)
    {
        $post = $user->posts()->paginate(5);
        $categories = $user->categories;

        return view('blog.index', [

            'posts' => $post,
            'categories' => $categories,

        ]);
    }
}