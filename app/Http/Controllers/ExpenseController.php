<?php

namespace App\Http\Controllers;

use App\Events\ExpenseWasCreated;
use App\Expense;
use App\ExpenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.expenses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenseTypes = ExpenseType::all();
        return view('admin.expenses.create', compact('expenseTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lastBalance = Auth::user()->balances()->lastBalance();

        if (Auth::user()->balances->isEmpty()){
            return redirect()->back()->with('warning', 'No tienes una caja activa');
        }
        if ($lastBalance->state->abbreviation !== 'gen-act'){
            return redirect()->back()->with('warning', 'No tienes una caja activa');
        }

        $this->validate($request, [
            'description' => ['required'],
            'cash' => [
                function ($attribute, $value, $fail) use ($lastBalance) {
                    if ($value > $lastBalance->system_real_cash) {
                        $fail('No hay suficiente saldo en efectivo en la caja.');
                    }
                },
            ],
            'card' => [
                function ($attribute, $value, $fail) use ($lastBalance){
                    if ($value > $lastBalance->system_real_card) {
                        $fail('No hay suficiente saldo en tarjeta en la caja.');
                    }
                },
            ],
            'cheque' => [
                function ($attribute, $value, $fail) use ($lastBalance){
                    if ($value > $lastBalance->system_real_cheque) {
                        $fail('No hay suficiente saldo en cheque en la caja.');
                    }
                },
            ],
        ]);

        $request['total'] = $request->cash + $request->card + $request->cheque;
        $request['user_id'] = Auth::user()->id;
        $request['balance_id'] = $lastBalance->id;

        //dd($request->all());

        $expense = Expense::create($request->all());

        ExpenseWasCreated::dispatch(
            $expense->cash,
            $expense->card,
            $expense->cheque,
            $expense->total
        );

        return redirect()->route('expenses.index')->with('flash', 'Gasto creado correctamente');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        //
    }
}
