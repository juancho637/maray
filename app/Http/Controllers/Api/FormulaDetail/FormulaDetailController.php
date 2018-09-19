<?php

namespace App\Http\Controllers\Api\FormulaDetail;

use App\FormulaDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FormulaDetailController extends Controller
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
     * @param  \App\FormulaDetail  $formulaDetail
     * @return \Illuminate\Http\Response
     */
    public function show(FormulaDetail $formulaDetail)
    {
        return response()->json([
            'formula_detail' => $formulaDetail,
            'product' => $formulaDetail->product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\FormulaDetail  $formulaDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(FormulaDetail $formulaDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\FormulaDetail $formulaDetail
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function update(Request $request, FormulaDetail $formulaDetail)
    {
        $formulaDetail->update($request->all());

        return response()->json([
            'view' => view('admin.histories.partials.tableFormulaTemplate', ['engagement' => $formulaDetail->formula->history->engagement])->render()
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\FormulaDetail $formulaDetail
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function destroy(FormulaDetail $formulaDetail)
    {
        $formulaDetail->delete();

        return response()->json([
            'view' => view('admin.histories.partials.tableFormulaTemplate', ['engagement' => $formulaDetail->formula->history->engagement])->render()
        ]);
    }
}
