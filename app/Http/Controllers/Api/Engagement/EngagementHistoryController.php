<?php

namespace App\Http\Controllers\Api\Engagement;

use App\Engagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EngagementHistoryController extends Controller
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
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Engagement $engagement
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Engagement $engagement)
    {
        $history = $engagement->history()->create($request->all());

        return response()->json($history, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Engagement  $engagement
     * @return \Illuminate\Http\Response
     */
    public function show(Engagement $engagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Engagement  $engagement
     * @return \Illuminate\Http\Response
     */
    public function edit(Engagement $engagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Engagement  $engagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Engagement $engagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Engagement  $engagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Engagement $engagement)
    {
        //
    }
}
