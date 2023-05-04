<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\StoreDemandRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\StoreSupplyRequest;
use App\Http\Requests\UpdateDemandRequest;
use App\Models\Category;
use App\Models\Demand;
use App\Models\Post;
use App\Models\Supply;
use Inertia\Inertia;

class DemandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $demands = Post::where('postable_type', 'App\Models\Demand')->whereNot('user_id', auth()->user()->id)->with(['postable', 'categories', 'user'])->orderBy('created_at', 'desc')->get();

        return Inertia::render('Demands/Index', compact('demands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $supplies = Supply::all();

        return Inertia::render('Demands/Create', compact(['categories','supplies']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDemandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(
        StoreDemandRequest $demandRequest,
        StorePostRequest $postRequest,
        StoreCategoryRequest $categoryRequest,
        StoreSupplyRequest $supplyRequest
    )
    {

        $demand = new Demand([
        ]);

        $demand->save();

        $post = new Post([
            'title' => $postRequest->input('title'),
            'description' => $postRequest->input('description'),
            'user_id' => auth()->user()->id,
            'duration_min' => $postRequest->input('duration_min'),
            'preferred_location' => $postRequest->input('preferred_location'),
            'status' => $postRequest->input('status'),
        ]);

        $post->postable()->associate($demand);

        $categories = $categoryRequest->input('categories');

        $supplies = $supplyRequest->input('supplies');

        $post->save();

        $post->categories()->attach($categories);

        $post->supplies()->attach($supplies);

        return redirect()->route('demands.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function show(Demand $demand)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function edit(Demand $demand)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDemandRequest  $request
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDemandRequest $request, Demand $demand)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Demand  $demand
     * @return \Illuminate\Http\Response
     */
    public function destroy(Demand $demand)
    {
        //
    }
}
