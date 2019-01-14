<?php

namespace App\Http\Controllers;

use App\Credit;
use App\Events\CreditPaymentWasCreated;
use App\Events\InvoiceWasCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CreditController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.credits.index');
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
        return view('admin.credits.edit', compact('credit'));
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
        $this->validate($request, [
            'positiveBalance' => 'in:0'
        ]);

        $request['value'] = $request->cash + $request->cheque + $request->card;
        $lastBalance = Auth::user()->balances()->lastBalance();

        if (Auth::user()->balances->isEmpty()){
            return redirect()->back()->with('warning', 'No tienes una caja activa');
        }
        if ($lastBalance->state->abbreviation !== 'gen-act'){
            return redirect()->back()->with('warning', 'No tienes una caja activa');
        }

        $request['balance_id'] = $lastBalance->id;
        $request['user_id'] = Auth::user()->id;

        if(($request->cash + $request->card + $request->cheque) > 0){
            $payment = $credit->creditPayments()->create($request->all());

            CreditPaymentWasCreated::dispatch(
                $payment->cash,
                $payment->cheque,
                $payment->card,
                $payment->value
            );

            if ($credit->purchase_order->type === 'invoice'){
                InvoiceWasCreated::dispatch(
                    $payment->cash,
                    $payment->cheque,
                    $payment->card,
                    $payment->value
                );
            }

            $credit->update([
                'outstanding_balance' => ($credit->outstanding_balance - $payment->value)
            ]);

            return redirect()->route('credits.index')->with('flash', 'Pago generado correctamente');
        }else{
            return redirect()->back()->with('warning', 'El pago debe ser mayor a $0');
        }
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
