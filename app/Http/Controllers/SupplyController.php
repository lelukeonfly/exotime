<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSupplyRequest;
use App\Http\Requests\UpdateSupplyRequest;
use App\Models\Supply;

class SupplyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoreSupplyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSupplyRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function show(Supply $supply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function edit(Supply $supply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSupplyRequest  $request
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSupplyRequest $request, Supply $supply)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Supply  $supply
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supply $supply)
    {
        //
    }
}
