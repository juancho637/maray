<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class CreditPayment extends Model
{
    protected $fillable = [
        'balance_id',
        'credit_id',
        'user_id',
        'cash',
        'cheque',
        'card',
        'value',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function balance(){
        return $this->belongsTo(Balance::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function credit(){
        return $this->belongsTo(Credit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(){
        return $this->belongsTo(User::class);
    }

    /*public function setBalanceIdAttribute()
    {
        $this->attributes['balance_id'] =  Auth::user()->balances()->lastBalance()->id;
    }

    public function setUserIdAttribute()
    {
        $this->attributes['user_id'] =  Auth::user()->id;
    }*/

    public function setCashAttribute($cash)
    {
        if($cash === null){
            $this->attributes['cash'] =  0;
        }else{
            $this->attributes['cash'] =  $cash;
        }
    }

    public function setChequeAttribute($cheque)
    {
        if($cheque === null){
            $this->attributes['cheque'] =  0;
        }else{
            $this->attributes['cheque'] =  $cheque;
        }
    }

    public function setCardAttribute($card)
    {
        if($card === null){
            $this->attributes['card'] =  0;
        }else{
            $this->attributes['card'] =  $card;
        }
    }

    public function scopeCreditInvoice($query)
    {
        return $query->whereHas('credit', function ($query) {
            $query->whereHas('purchase_order', function ($query) {
                $query->where('type', 'invoice');
            });
        });
    }
}
