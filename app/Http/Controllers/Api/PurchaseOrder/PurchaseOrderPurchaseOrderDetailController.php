<?php

namespace App\Http\Controllers\Api\PurchaseOrder;

use App\Detail;
use App\Product;
use App\PurchaseOrder;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PurchaseOrderPurchaseOrderDetailController extends Controller
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
     * @param  \App\PurchaseOrder $purchaseOrder
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function store(Request $request, PurchaseOrder $purchaseOrder)
    {
        if ($request->has('control_engagement')){
            $product = Product::name("servicio sin costo")->first();
            $newDetail = [
                "quantity" => 1,
                "product_id" => $product->id
            ];
        }else{
            $product = Product::find($request->product_id);
            $newDetail = $request->all();
        }

        $newDetail['tax_percentage'] = $product->tax_percentage;
        $newDetail['value'] = $product->value;

        $purchaseOrderDetail = $purchaseOrder->details()->create($newDetail);

        $purchaseOrder->subtotal += $product->value * $newDetail['quantity'];
        $purchaseOrder->taxes += $product->taxes * $newDetail['quantity'];
        $purchaseOrder->total_value += $product->unit_value * $newDetail['quantity'];
        $purchaseOrder->save();

        if ($request->has('control_engagement') || $request->has('vaccine_engagement')){
            return response()->json($purchaseOrderDetail, 200);
        }else{
            return response()->json(view('admin.histories.partials.trPurchaseOrderTemplate', ['details' => $purchaseOrder->details])->render());
        }
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
     * @param  \Illuminate\Http\Request $request
     * @param  \App\PurchaseOrder $purchaseOrder
     * @param Detail $detail
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function update(Request $request, PurchaseOrder $purchaseOrder, Detail $detail)
    {
        $product = Product::find($request->product_id);

        $updateDetail = $request->all();
        $updateDetail['tax_percentage'] = $product->tax_percentage;
        $updateDetail['value'] = $product->value;

        $purchaseOrder->subtotal -= $detail->value * $detail->quantity;
        $purchaseOrder->taxes -= $detail->taxes * $detail->quantity;
        $purchaseOrder->total_value -= $detail->unit_value * $detail->quantity;

        $detail->update($updateDetail);

        $purchaseOrder->subtotal += $product->value * $updateDetail['quantity'];
        $purchaseOrder->taxes += $product->taxes * $updateDetail['quantity'];
        $purchaseOrder->total_value += $product->unit_value * $updateDetail['quantity'];
        $purchaseOrder->save();

        if ($request->has('control_engagement') || $request->has('vaccine_engagement')){
            return response()->json($detail, 200);
        }else{
            return response()->json(view('admin.histories.partials.trPurchaseOrderTemplate', ['details' => $purchaseOrder->details])->render());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PurchaseOrder $purchaseOrder
     * @param  \App\Detail $detail
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function destroy(PurchaseOrder $purchaseOrder, Detail $detail)
    {
        $purchaseOrder->subtotal -= $detail->value * $detail->quantity;
        $purchaseOrder->taxes -= $detail->taxes * $detail->quantity;
        $purchaseOrder->total_value -= $detail->unit_value * $detail->quantity;
        $purchaseOrder->save();
        $detail->delete();

        return response()->json(view('admin.histories.partials.trPurchaseOrderTemplate', ['details' => $purchaseOrder->details])->render());
    }
}
