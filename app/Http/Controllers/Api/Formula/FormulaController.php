<?php

namespace App\Http\Controllers\Api\Formula;

use App\Formula;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormulaController extends Controller
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
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function show(Formula $formula)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function edit(Formula $formula)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Formula $formula)
    {
        $formula->update($request->all());

        return response()->json($formula, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Formula  $formula
     * @return \Illuminate\Http\Response
     */
    public function destroy(Formula $formula)
    {
        //
    }
}
