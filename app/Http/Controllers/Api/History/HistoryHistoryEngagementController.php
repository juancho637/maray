<?php

namespace App\Http\Controllers\Api\History;

use App\History;
use App\HistoryEngagement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryHistoryEngagementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @param  \App\History $history
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function index(Request $request, History $history)
    {
        return response()->json([
            'view' => view(
                'admin.histories.partials.vaccineForm',
                ['historyEngagements' => $history->historyEngagements()->engagementService($request->abbreviation)->get()]
            )->render()
        ]);
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
     * @param  \App\HistoryEngagement  $historyEngagement
     * @return \Illuminate\Http\Response
     */
    public function show(HistoryEngagement $historyEngagement)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\HistoryEngagement  $historyEngagement
     * @return \Illuminate\Http\Response
     */
    public function edit(HistoryEngagement $historyEngagement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\HistoryEngagement  $historyEngagement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HistoryEngagement $historyEngagement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\HistoryEngagement  $historyEngagement
     * @return \Illuminate\Http\Response
     */
    public function destroy(HistoryEngagement $historyEngagement)
    {
        //
    }
}
