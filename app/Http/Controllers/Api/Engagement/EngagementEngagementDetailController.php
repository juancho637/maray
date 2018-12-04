<?php

namespace App\Http\Controllers\Api\Engagement;

use App\Engagement;
use App\Service;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EngagementEngagementDetailController extends Controller
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
        $newEngagementDetail = $request->all();
        $newEngagementDetail['service_id'] = Service::abbreviation($newEngagementDetail['abbreviation'])->first()->id;
        $engagementDetail = $engagement->detailEngagements()->create($newEngagementDetail);
        $engagementDetail->users()->sync($newEngagementDetail['users']);

        return response()->json($engagementDetail, 200);
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
