<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index ()
    {
        
        $latestPosts = Post::latest()->take(3)->get();
        $latestBlogs = User::orderBy(
            Post::select('created_at')
                ->whereColumn('users.id', 'posts.author_id')
                ->latest()
                ->take(1)
        , 'desc')
        ->take(3)->get();

        return view('welcome',[
         'latestPosts' => $latestPosts,
         'latestBlogs' => $latestBlogs,
        ]);

        
    }
}
