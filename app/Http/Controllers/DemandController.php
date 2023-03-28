<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDemandRequest;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdateDemandRequest;
use App\Models\Demand;
use App\Models\Post;
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
        $demands = Post::where('postable_type', 'App\Models\Demand')->with(['postable', 'categories', 'user'])->get();

        return Inertia::render('Demands/Index', compact('demands'));
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
     * @param  \App\Http\Requests\StoreDemandRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDemandRequest $demandRequest, StorePostRequest $postRequest)
    {
        $demand = new Demand([
            'name' => $demandRequest->input('name'),
            'duration_min' => $demandRequest->input('duration_min'),
    ]);

        $demand->save();

        $post = new Post([
            'title' => $postRequest->input('title'),
            'description' => $postRequest->input('description'),
            'user_id' => auth()->user()->id,
    ]);

        $post->postable()->associate($demand);

        $post->save();
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