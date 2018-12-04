<?php

namespace App\Http\Controllers\DataTable;

use App\Credit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index()
    {
        return DataTables::of(Credit::with('state', 'purchase_order.client', 'purchase_order.user'))
            ->addColumn('actions', 'admin.credits.partials.actions')
            ->rawColumns(['actions'])
            ->editColumn('created_at', function(Credit $credit) {
                return $credit->created_at->format('Y-m-d');
            })
            ->addColumn('purchase_order_type', function(Credit $credit) {
                if ($credit->purchase_order->type === 'purchaseOrder'){
                    return 'Orden de compra #'.$credit->purchase_order->consecutive;
                }
                if ($credit->purchase_order->type === 'invoice'){
                    return 'Factura #'.$credit->purchase_order->consecutive;
                }

                return '';
            })
            ->toJson();
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
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function show(Credit $credit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function edit(Credit $credit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Credit $credit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Credit  $credit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Credit $credit)
    {
        //
    }
}
