<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function store(Request $request, User $user)
    {
        $validated = $request->validate(['email' => 'required|email|unique:subscribers']);

        $user->subscribers()->create($validated);

        return to_route('blog.index', $user)
            ->with('status', 'thank for subscribing!')
            ->withFragment('footer');
    }
}
