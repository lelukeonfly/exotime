<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTemporaryBanRequest;
use App\Http\Requests\UpdateTemporaryBanRequest;
use App\Models\TemporaryBan;

class TemporaryBanController extends Controller
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
     * @param  \App\Http\Requests\StoreTemporaryBanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTemporaryBanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TemporaryBan  $temporaryBan
     * @return \Illuminate\Http\Response
     */
    public function show(TemporaryBan $temporaryBan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TemporaryBan  $temporaryBan
     * @return \Illuminate\Http\Response
     */
    public function edit(TemporaryBan $temporaryBan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTemporaryBanRequest  $request
     * @param  \App\Models\TemporaryBan  $temporaryBan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTemporaryBanRequest $request, TemporaryBan $temporaryBan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TemporaryBan  $temporaryBan
     * @return \Illuminate\Http\Response
     */
    public function destroy(TemporaryBan $temporaryBan)
    {
        //
    }
}
