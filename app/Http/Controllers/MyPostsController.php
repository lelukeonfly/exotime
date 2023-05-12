<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class MyPostsController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $posts = Post::with(['postable', 'user', 'categories'])->where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get();

        return Inertia::render('Posts/Index', compact('posts'));
    }
}
