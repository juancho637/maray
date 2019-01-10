<?php

namespace App\Http\Controllers;

use App\Balance;
use App\Deposit;
use App\Events\ExpenseWasCreated;
use App\Events\InvoiceWasCreated;
use App\Events\PurchaseOrderWasCreated;
use App\Http\Requests\StorePurchaseOrderRequest;
use App\Product;
use App\PurchaseOrder;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PurchaseOrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.purchaseOrders.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.purchaseOrders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StorePurchaseOrderRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePurchaseOrderRequest $request)
    {
        $purchaseOrderFields = $request->all();
        $purchaseOrderFields['user_id'] = Auth::user()->id;
        $lastBalance = Auth::user()->balances()->lastBalance();
        $lastConsecutive = PurchaseOrder::lastConsecutive($request->type);

        /*if ($purchaseOrderFields['cash'] === null){
            $purchaseOrderFields['cash'] = 0;
        }
        if ($purchaseOrderFields['cheque'] === null){
            $purchaseOrderFields['cheque'] = 0;
        }
        if ($purchaseOrderFields['card'] === null){
            $purchaseOrderFields['card'] = 0;
        }
        if ($purchaseOrderFields['credit'] === null){
            $purchaseOrderFields['credit'] = 0;
        }*/

        if (isset($purchaseOrderFields['deposits'])){
            $purchaseOrderFields['deposit'] = 0;
            foreach ($purchaseOrderFields['deposits'] as $deposit){
                $purchaseOrderFields['deposit'] += Deposit::find($deposit)->total;
            }
        }

        if ($lastConsecutive->isEmpty()){
            $consecutive = 1;
        }else{
            $consecutive = $lastConsecutive->first()->consecutive + 1;
        }

        $purchaseOrderSubtotal = 0;
        $purchaseOrderTaxes = 0;
        $message = '';

        if (Auth::user()->balances->isEmpty()){
            return redirect()->back()->with('warning', 'No tienes una caja activa');
        }
        if ($lastBalance->state->abbreviation !== 'gen-act'){
            return redirect()->back()->with('warning', 'No tienes una caja activa');
        }

        if ($request->type === 'quotation'){
            $message = 'Cotización';
        }
        if ($request->type === 'purchaseOrder'){
            $message = 'Orden de compra';
            $purchaseOrderFields['consecutive'] = $consecutive;
            $purchaseOrderFields['balance_id'] = $lastBalance->id;
            $purchaseOrderFields['totalBalance'] = $purchaseOrderFields['subTotal'];
        }
        if ($request->type === 'invoice'){
            $message = 'Factura';
            $purchaseOrderFields['consecutive'] = $consecutive;
            $purchaseOrderFields['balance_id'] = $lastBalance->id;
            $purchaseOrderFields['totalBalance'] = $purchaseOrderFields['total'];
        }

        //dd($purchaseOrderFields);

        $purchaseOrder = PurchaseOrder::create($purchaseOrderFields);

        if ($purchaseOrderFields['credit'] > 0){
            $purchaseOrder->credit()->create([
                'balance_id' => $lastBalance->id,
                'value' => $purchaseOrderFields['credit'],
                'outstanding_balance' => $purchaseOrderFields['credit'],
            ]);
        }

        if (isset($purchaseOrderFields['deposits'])){
            foreach ($purchaseOrderFields['deposits'] as $deposit){
                Deposit::find($deposit)->update([
                    'balance_assigned_id' => $lastBalance->id,
                    'purchase_order_id' => $purchaseOrder->id,
                    'state_id' => State::where('abbreviation', 'deposit-assigned')->first()->id,
                ]);
            }
        }

        foreach ($request->products as $product){
            $item = Product::find($product['product_id']);
            $purchaseOrderDetailField = [
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'tax_percentage' => $item['tax_percentage'],
                'value' => $item['value']
            ];

            $purchaseOrderSubtotal += $item['value'] * $product['quantity'];
            $purchaseOrderTaxes += (($item['value'] * $item['tax_percentage'])/100) * $product['quantity'];
            $purchaseOrder->details()->create($purchaseOrderDetailField);
        }

        $purchaseOrder->update([
            'subtotal' => $purchaseOrderSubtotal,
            'taxes' => $purchaseOrderTaxes,
            'total_value' => $purchaseOrderSubtotal + $purchaseOrderTaxes
        ]);

        if ($request->type === 'purchaseOrder' || $request->type === 'invoice'){
            if (isset($purchaseOrderFields['credit'])){
                $purchaseOrderFields['totalBalance'] -= $purchaseOrderFields['credit'];
            }
            if (isset($purchaseOrderFields['deposit'])){
                $purchaseOrderFields['totalBalance'] -= $purchaseOrderFields['deposit'];
            }

            PurchaseOrderWasCreated::dispatch(
                $purchaseOrderFields['cash'],
                $purchaseOrderFields['cheque'],
                $purchaseOrderFields['card'],
                $purchaseOrderFields['totalBalance']
            );

            if ($request->type === 'invoice'){
                InvoiceWasCreated::dispatch(
                    $purchaseOrderFields['cash'],
                    $purchaseOrderFields['cheque'],
                    $purchaseOrderFields['card'],
                    $purchaseOrderFields['totalBalance']
                );
            }
        }

        if ($purchaseOrderFields['positiveBalance'] > 0){
            $expense = $purchaseOrder->expense()->create([
                'user_id' => Auth::user()->id,
                'balance_id' => $lastBalance->id,
                'cash' => $purchaseOrderFields['positiveBalance'],
                'total' => $purchaseOrderFields['positiveBalance'],
            ]);

            ExpenseWasCreated::dispatch(
                $expense->value,
                0,
                0,
                $expense->value
            );
        }

        //return redirect()->route('engagements.index')->with('flash', 'Cita creada correctamente, <a target="_blank" href="'. route("engagements.print", $engagement->id) .'">Imprimela</a>');
        return redirect()->route('purchaseOrders.index')->with('flash', $message.' creada correctamente');
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
        if ($purchaseOrder->type !== null){
            if ($purchaseOrder->type !== 'quotation'){
                return redirect()->route('purchaseOrders.index')->with('warning', 'No tienes acceso al recurso que intentas acceder.');
            }
        }

        return view('admin.purchaseOrders.edit', compact('purchaseOrder'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param StorePurchaseOrderRequest $request
     * @param  \App\PurchaseOrder $purchaseOrder
     * @return \Illuminate\Http\Response
     */
    public function update(StorePurchaseOrderRequest $request, PurchaseOrder $purchaseOrder)
    {
        $purchaseOrderFields = $request->all();
        $purchaseOrderFields['user_id'] = Auth::user()->id;
        $lastBalance = Auth::user()->balances()->lastBalance();
        $lastConsecutive = PurchaseOrder::lastConsecutive($request->type);

        if (isset($purchaseOrderFields['deposits'])){
            $purchaseOrderFields['deposit'] = 0;
            foreach ($purchaseOrderFields['deposits'] as $deposit){
                $purchaseOrderFields['deposit'] += Deposit::find($deposit)->total;
            }
        }

        if ($lastConsecutive->isEmpty()){
            $consecutive = 1;
        }else{
            $consecutive = $lastConsecutive->first()->consecutive + 1;
        }

        $purchaseOrderSubtotal = 0;
        $purchaseOrderTaxes = 0;
        $message = '';

        if (Auth::user()->balances->isEmpty()){
            return redirect()->back()->with('warning', 'No tienes una caja activa');
        }
        if ($lastBalance->state->abbreviation !== 'gen-act'){
            return redirect()->back()->with('warning', 'No tienes una caja activa');
        }

        if ($request->type === 'quotation'){
            $message = 'Cotización';
        }
        if ($request->type === 'purchaseOrder'){
            $message = 'Orden de compra';
            $purchaseOrderFields['consecutive'] = $consecutive;
            $purchaseOrderFields['balance_id'] = $lastBalance->id;
            $purchaseOrderFields['totalBalance'] = $purchaseOrderFields['subTotal'];
        }
        if ($request->type === 'invoice'){
            $message = 'Factura';
            $purchaseOrderFields['consecutive'] = $consecutive;
            $purchaseOrderFields['balance_id'] = $lastBalance->id;
            $purchaseOrderFields['totalBalance'] = $purchaseOrderFields['total'];
        }

        //dd($purchaseOrderFields);

        $purchaseOrder->update($purchaseOrderFields);

        if ($purchaseOrderFields['credit'] > 0){
            $purchaseOrder->credit()->create([
                'balance_id' => $lastBalance->id,
                'value' => $purchaseOrderFields['credit'],
                'outstanding_balance' => $purchaseOrderFields['credit'],
            ]);
        }

        if (isset($purchaseOrderFields['deposits'])){
            foreach ($purchaseOrderFields['deposits'] as $deposit){
                Deposit::find($deposit)->update([
                    'balance_assigned_id' => $lastBalance->id,
                    'purchase_order_id' => $purchaseOrder->id,
                    'state_id' => State::where('abbreviation', 'deposit-assigned')->first()->id,
                ]);
            }
        }

        $purchaseOrder->details()->delete();
        foreach ($request->products as $product){
            $item = Product::find($product['product_id']);
            $purchaseOrderDetailField = [
                'product_id' => $product['product_id'],
                'quantity' => $product['quantity'],
                'tax_percentage' => $item['tax_percentage'],
                'value' => $item['value']
            ];

            $purchaseOrderSubtotal += $item['value'] * $product['quantity'];
            $purchaseOrderTaxes += (($item['value'] * $item['tax_percentage'])/100) * $product['quantity'];
            $purchaseOrder->details()->create($purchaseOrderDetailField);
        }

        $purchaseOrder->update([
            'subtotal' => $purchaseOrderSubtotal,
            'taxes' => $purchaseOrderTaxes,
            'total_value' => $purchaseOrderSubtotal + $purchaseOrderTaxes
        ]);

        if ($request->type === 'purchaseOrder' || $request->type === 'invoice'){
            if (isset($purchaseOrderFields['credit'])){
                $purchaseOrderFields['totalBalance'] -= $purchaseOrderFields['credit'];
            }
            if (isset($purchaseOrderFields['deposit'])){
                $purchaseOrderFields['totalBalance'] -= $purchaseOrderFields['deposit'];
            }

            PurchaseOrderWasCreated::dispatch(
                $purchaseOrderFields['cash'],
                $purchaseOrderFields['cheque'],
                $purchaseOrderFields['card'],
                $purchaseOrderFields['totalBalance']
            );

            if ($request->type === 'invoice'){
                InvoiceWasCreated::dispatch(
                    $purchaseOrderFields['cash'],
                    $purchaseOrderFields['cheque'],
                    $purchaseOrderFields['card'],
                    $purchaseOrderFields['totalBalance']
                );
            }
        }

        if ($purchaseOrderFields['positiveBalance'] > 0){
            $expense = $purchaseOrder->expense()->create([
                'user_id' => Auth::user()->id,
                'balance_id' => $lastBalance->id,
                'value' => $purchaseOrderFields['positiveBalance'],
            ]);

            ExpenseWasCreated::dispatch(
                $expense->value,
                $expense->value
            );
        }

        //return redirect()->route('engagements.index')->with('flash', 'Cita creada correctamente, <a target="_blank" href="'. route("engagements.print", $engagement->id) .'">Imprimela</a>');
        return redirect()->route('purchaseOrders.index')->with('flash', $message.' actualizada correctamente.');
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
