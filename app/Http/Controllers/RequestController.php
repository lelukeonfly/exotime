<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Inertia\Inertia;

class RequestController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $forMe = Post::with(['requestedByUsers','user'])->where('user_id', auth()->user()->id)->has('requestedByUsers')->get();
        $byMe = auth()->user()->load('requestedPosts.user');

        return Inertia::render('Requests',compact(['byMe','forMe']));
    }
}
