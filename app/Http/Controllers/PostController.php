<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdateDemandRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Category;
use App\Models\Demand;
use App\Models\Post;
use App\Models\Service;
use App\Models\Supply;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::with(['postable', 'user', 'categories'])->get();

        return Inertia::render('Posts/Index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePostRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePostRequest $request)
    {
        // leave empty
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        $post->load(['postable', 'categories', 'supplies', 'user', 'feedbacks.user']);
        $requesters = $post->requestedByUsers()->where('status','pending')->get();

        return Inertia::render('Posts/Show', compact(['post','requesters']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post->load(['postable', 'categories', 'supplies', 'user']);
        $categories = Category::all();
        $supplies = Supply::all();

        return Inertia::render('Posts/Edit', compact(['post', 'categories', 'supplies']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(
        UpdatePostRequest $postRequest,
        /* UpdateServiceRequest $serviceRequest, */
        UpdateDemandRequest $demandRequest,
        Post $post
    )
    {

        $postable = $post->postable;
        $post->fill($postRequest->only([
            'title',
            'description',
            'duration_min',
            'preferred_location',
            'status',
        ]));
        $post->save();

        if ($postable instanceof Service) {
        /*     $postable->fill($serviceRequest->only(['name', 'duration_min'])); */
            $return = 'services';
        }
        if ($postable instanceof Demand) {
        /*     $postable->fill($demandRequest->only(['location','duration_min','starting_at','ending_at'])); */
            $return = 'demands';
        }

        /* $postable->save(); */

        $post->categories()->sync($postRequest->input('categories'));
        $post->supplies()->sync($postRequest->input('supplies'));

        return redirect()->route($return.'.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index');
    }
}
