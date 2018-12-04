<?php

namespace App\Http\Controllers\Api\EngagementDetail;

use App\DetailEngagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EngagementDetailController extends Controller
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\DetailEngagement  $engagement_detail
     * @return \Illuminate\Http\Response
     */
    public function show(DetailEngagement $engagement_detail)
    {
        //dd($engagement_detail);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DetailEngagement  $engagement_detail
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailEngagement $engagement_detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DetailEngagement  $engagement_detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailEngagement $engagement_detail)
    {
        $engagement_detail->update($request->all());

        return response()->json($engagement_detail, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DetailEngagement  $engagement_detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailEngagement $engagement_detail)
    {
        //
    }
}
