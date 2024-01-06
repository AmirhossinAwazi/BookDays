<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    public function index ()
    {
        
        $latestPosts = Post::latest()->take(1)->get();
        return view('welcome',[
         'latestPosts' => $latestPosts,
        ]);

        
    }
}
