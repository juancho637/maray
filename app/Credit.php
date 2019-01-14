<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Credit extends Model
{
    protected $fillable = [
        'purchase_order_id',
        'balance_id',
        'value',
        'outstanding_balance',
        'description',
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
    public function purchase_order(){
        return $this->belongsTo(PurchaseOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function creditPayments(){
        return $this->hasMany(CreditPayment::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state(){
        return $this->belongsTo(State::class);
    }

    public function scopeCreditInvoice($query)
    {
        return $query->whereHas('purchase_order', function ($query) {
            $query->where('type', 'invoice');
        });
    }
}
