<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'user_id',
        'client_id',
        'balance_id',
        'balance_assigned_id',
        'purchase_order_id',
        'state_id',
        'cash',
        'cheque',
        'card',
        'total',
        'used_date',
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
    public function purchaseOrder(){
        return $this->belongsTo(PurchaseOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client(){
        return $this->belongsTo(Client::class);
    }

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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function balanceAssigned(){
        return $this->belongsTo(Balance::class, 'balance_assigned_id');
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeUnassigned($query)
    {
        return $query->whereHas('state', function ($query) {
            $query->where('abbreviation', "gen-act");
        });
    }
}
