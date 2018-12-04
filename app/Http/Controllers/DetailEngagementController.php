<?php

namespace App\Http\Controllers;

use App\DetailEngagement;
use Illuminate\Http\Request;

class DetailEngagementController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
     * @param DetailEngagement $engagement_detail
     * @return void
     */
    public function show(DetailEngagement $engagement_detail)
    {
        dd($engagement_detail);
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
        //
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
