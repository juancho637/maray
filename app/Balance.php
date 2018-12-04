<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Balance extends Model
{
    protected $fillable = [
        'user_id',
        'state_id',
        'system_cash',
        'system_cheque',
        'system_card',
        'system_credit',
        'system_credit_payment',
        'system_expenditure',
        'system_total',
        'manual_cash',
        'manual_cheque',
        'manual_card',
        'manual_credit',
        'manual_credit_payment',
        'manual_expenditure',
        'manual_total',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state(){
        return $this->belongsTo(State::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deposits(){
        return $this->hasMany(Deposit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function depositsAssigned(){
        return $this->hasMany(Deposit::class, 'balance_assigned_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenses(){
        return $this->hasMany(Expense::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function purchaseOrders(){
        return $this->hasMany(PurchaseOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function credits(){
        return $this->hasMany(Credit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creditPayments(){
        return $this->hasMany(CreditPayment::class);
    }

    public function scopeAllowed($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }

    public function scopeLastBalance($query)
    {
        return $query->orderBy('id', 'desc')->first();
    }

    public function scopePurchaseOrdersType($query, $type)
    {
        return $query->whereHas('purchaseOrders', function ($query) use ($type) {
            $query->where('type', $type);
        });
    }
}
