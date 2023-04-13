<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\Service;
use Inertia\Inertia;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //$services = Service::with(['post.categories','post.user'])->get();

        //return Inertia::render('Services/Index', compact('services'));
        $services = Post::where('postable_type', 'App\Models\Service')->with(['postable', 'categories', 'user'])->get();

        return Inertia::render('Services/Index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return Inertia::render('Services/Create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreServiceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreServiceRequest $serviceRequest, StorePostRequest $postRequest, StoreCategoryRequest $categoryRequest)
    {
        $service = new Service([
            'name' => $serviceRequest->input('name'),
            'duration_min' => $serviceRequest->input('duration_min'),
    ]);

        $service->save();

        $post = new Post([
            'title' => $postRequest->input('title'),
            'description' => $postRequest->input('description'),
            'user_id' => auth()->user()->id,
        ]);

        $post->postable()->associate($service);

        $categories = $categoryRequest->input('categories');

        $post->save();

        $post->categories()->attach($categories);
    }

    /**
    * Display the specified resource.
    *
    * @param  \App\Models\Service  $service
    * @return \Illuminate\Http\Response
    */
    public function show(Service $service)
    {
        $service->load('post.categories');

        return Inertia::render('Services/Show', compact('service'));
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param  \App\Models\Service  $service
    * @return \Illuminate\Http\Response
    */
    public function edit(Service $service)
    {

        /* $post->load(['postable', 'categories', 'user']); */
        /* $categories = Category::all(); */
        /*  */
        /* return Inertia::render('Services/Edit', compact(['post', 'categories'])); */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceRequest  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        dd('update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service)
    {
        $service->delete();

        return redirect()->route('services.index');
    }
}
