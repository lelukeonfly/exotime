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
        $post->load(['postable', 'categories', 'user']);

        return Inertia::render('Posts/Show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $post->load(['postable', 'categories', 'user']);
        $categories = Category::all();

        return Inertia::render('Posts/Edit', compact(['post', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePostRequest  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $post)
    {


        ddd(

            [
                $request,
                $post
            ]

        );

        /* $postable = $post->postable; */
        /* $post->fill($postRequest); */
        /* $post->save(); */
        /*  */
        /* if ($postable instanceof Service) { */
        /*     $postable->fill($serviceRequest); */
        /* } */
        /* if ($postable instanceof Demand) { */
        /*     $postable->fill($demandRequest); */
        /* } */
        /*  */
        /* $postable->save(); */
        /*  */
        /* $post->categories()->sync($postRequest->input('categories')); */
        /*  */
        /* return redirect()->route('posts.index'); */
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
