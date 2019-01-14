<?php

namespace App\Http\Controllers;

use App\Balance;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class BalanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $balances = Balance::allowed()->orderBy('id', 'DESC')->get();

        return view('admin.balances.index', compact('balances'));
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
        Balance::create([
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('balances.index')->with('flash', 'Caja creada correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function show(Balance $balance)
    {
        return view('admin.balances.show', compact('balance'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function edit(Balance $balance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Balance $balance)
    {
        $this->validate($request, [
            'manual_cash' => 'required_without_all:manual_cheque,manual_card,manual_expenditure',
            'manual_cash' => 'required_without_all:manual_cheque,manual_card,manual_expenditure',
            'manual_cheque' => 'required_without_all:manual_cheque,manual_cash,manual_expenditure',
            'manual_card' => 'required_without_all:manual_cash,manual_cheque,manual_expenditure',
            'manual_expenditure' => 'required_without_all:manual_cash,manual_cheque,manual_card',
            'manual_invoice_cash' => 'required_without_all:manual_invoice_cheque,manual_invoice_card,manual_cash,manual_cheque,manual_card',
            'manual_invoice_cheque' => 'required_without_all:manual_invoice_cash,manual_invoice_card,manual_cash,manual_cheque,manual_card',
            'manual_invoice_card' => 'required_without_all:manual_invoice_cheque,manual_invoice_cash,manual_cash,manual_cheque,manual_card',
        ]);

        $request['state_id'] = State::where('abbreviation', 'balance-closed')->first()->id;
        $balance->update($request->all());

        return redirect()->route('balances.index')->with('flash', 'Caja cerrada correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Balance  $balance
     * @return \Illuminate\Http\Response
     */
    public function destroy(Balance $balance)
    {
        //
    }

    /**
     * Print the specified resource.
     *
     * @param  \App\Balance $balance
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function printOrder(Balance $balance)
    {
        $view = view('admin.balances.print_order', compact('balance'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream();
    }

    /**
     * Print the specified resource.
     *
     * @param  \App\Balance $balance
     * @return \Illuminate\Http\Response
     * @throws \Throwable
     */
    public function printInvoice(Balance $balance)
    {
        $view = view('admin.balances.print_invoice', compact('balance'))->render();
        $pdf = App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream();
    }
}
