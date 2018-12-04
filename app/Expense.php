<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    protected $fillable = [
        'user_id',
        'balance_id',
        'purchase_order_id',
        'expense_type_id',
        'state_id',
        'cash',
        'card',
        'cheque',
        'total',
        'description',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function balance()
    {
        return $this->belongsTo(Balance::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function expense_type()
    {
        return $this->belongsTo(ExpenseType::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchaseOrder()
    {
        return $this->belongsTo(PurchaseOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function scopeReturns($query)
    {
        return $query->where('purchase_order_id', '<>', null);
    }

    public function scopeNotReturns($query)
    {
        return $query->where('purchase_order_id', null);
    }

    public function setCashAttribute($cash)
    {
        if($cash === null){
            $this->attributes['cash'] = 0;
        } else {
            $this->attributes['cash'] = $cash;
        }
    }

    public function setChequeAttribute($cheque)
    {
        if($cheque === null){
            $this->attributes['cheque'] = 0;
        } else {
            $this->attributes['cheque'] = $cheque;
        }
    }

    public function setCardAttribute($card)
    {
        if($card === null){
            $this->attributes['card'] = 0;
        } else {
            $this->attributes['card'] = $card;
        }
    }
}
