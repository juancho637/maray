<?php

namespace App\Http\Controllers\Api\History;

use App\History;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HistoryClinicExamController extends Controller
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
     * @param  \App\History $history
     * @return void
     */
    public function store(Request $request, History $history)
    {
        if ($request->has('systems')){
            $keySystem = array_keys($request->systems)[0];
            $keyItem = array_keys($request->systems[$keySystem])[0];
            $contItem = $request->systems[$keySystem][$keyItem];

            if($history->switchModel($keySystem)->exists()){
                $history->switchModel($keySystem)->update([$keyItem => $contItem]);
            }else{
                $history->switchModel($keySystem)->create([$keyItem => $contItem]);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function show(History $history)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function edit(History $history)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, History $history)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\History  $history
     * @return \Illuminate\Http\Response
     */
    public function destroy(History $history)
    {
        //
    }
}
