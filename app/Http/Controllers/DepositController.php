<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Events\DepositWasCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.deposits.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.deposits.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'client_id' => 'required|exists:clients,id',
            'cash' => 'required_without_all:cash,cheque,card',
            'cheque' => 'required_without_all:cash,cheque,card',
            'card' => 'required_without_all:cash,cheque,card',
        ]);

        $lastBalance = Auth::user()->balances()->lastBalance();

        if (Auth::user()->balances->isEmpty()){
            return redirect()->route('balances.index')->with('warning', 'No tienes una caja activa');
        }

        if ($lastBalance->state->abbreviation !== 'gen-act'){
            return redirect()->route('balances.index')->with('warning', 'No tienes una caja activa');
        }

        $depositFields = $request->all();

        if ($depositFields['cash'] === null){
            $depositFields['cash'] = 0;
        }
        if ($depositFields['cheque'] === null){
            $depositFields['cheque'] = 0;
        }
        if ($depositFields['card'] === null){
            $depositFields['card'] = 0;
        }

        $depositFields['user_id'] = Auth::user()->id;
        $depositFields['balance_id'] = $lastBalance->id;
        $depositFields['total'] = $request->cash + $request->cheque + $request->card;

        Deposit::create($depositFields);

        DepositWasCreated::dispatch(
            $depositFields['cash'],
            $depositFields['cheque'],
            $depositFields['card'],
            $depositFields['total']
        );

        return redirect()->route('deposits.index')->with('flash', 'Deposito creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit(Deposit $deposit)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deposit $deposit)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}
