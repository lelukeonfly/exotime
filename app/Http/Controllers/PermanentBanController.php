<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePermanentBanRequest;
use App\Http\Requests\UpdatePermanentBanRequest;
use App\Models\PermanentBan;

class PermanentBanController extends Controller
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
     * @param  \App\Http\Requests\StorePermanentBanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePermanentBanRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermanentBan  $permanentBan
     * @return \Illuminate\Http\Response
     */
    public function show(PermanentBan $permanentBan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermanentBan  $permanentBan
     * @return \Illuminate\Http\Response
     */
    public function edit(PermanentBan $permanentBan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePermanentBanRequest  $request
     * @param  \App\Models\PermanentBan  $permanentBan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePermanentBanRequest $request, PermanentBan $permanentBan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermanentBan  $permanentBan
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermanentBan $permanentBan)
    {
        //
    }
}
