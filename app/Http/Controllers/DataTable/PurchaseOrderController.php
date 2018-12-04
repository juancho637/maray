<?php

namespace App\Http\Controllers\DataTable;

use App\PurchaseOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\DataTables;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function index()
    {
        return DataTables::of(PurchaseOrder::with('state', 'client'))
            ->addColumn('actions', 'admin.purchaseOrders.partials.actions')
            ->rawColumns(['actions'])
            ->editColumn('created_at', function(PurchaseOrder $purchaseOrder) {
                return $purchaseOrder->created_at->format('Y-m-d');
            })
            ->editColumn('type', function(PurchaseOrder $purchaseOrder) {
                if ($purchaseOrder->type === 'quotation'){
                    return 'Cotización';
                }
                if ($purchaseOrder->type === 'purchaseOrder'){
                    return 'Orden de compra';
                }
                if ($purchaseOrder->type === 'invoice'){
                    return 'Factura';
                }

                return '';
            })
            ->editColumn('total_value', function(PurchaseOrder $purchaseOrder) {
                if ($purchaseOrder->type === 'purchaseOrder'){
                    return $purchaseOrder->subtotal;
                }
                return $purchaseOrder->total_value;
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
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function show(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function edit(PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseOrder  $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function destroy(PurchaseOrder $purchaseOrder)
    {
        //
    }
}
