<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseOrder extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'client_id',
        'user_id',
        'balance_id',
        'pet_id',
        'engagement_id',
        'state_id',
        'expires',
        'type',
        'consecutive',
        'cash',
        'cheque',
        'card',
        'credit',
        'deposit',
        'subtotal',
        'taxes',
        'total_value',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function client()
    {
        return $this->belongsTo(Client::class);
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
    public function balance()
    {
        return $this->belongsTo(Balance::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function engagement()
    {
        return $this->belongsTo(Engagement::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pet()
    {
        return $this->belongsTo(Pet::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function deposits()
    {
        return $this->hasMany(Deposit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function credit()
    {
        return $this->hasOne(Credit::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function expense()
    {
        return $this->hasOne(Expense::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }

    public function scopeLastConsecutive($query, $type)
    {
        return $query->where('type', $type)->orderBy('consecutive', 'desc')->take(1)->get();
    }

    public function scopeByType($query, $type)
    {
        return $query->where('type', $type)->get();
    }

    public function setCashAttribute($cash)
    {
        if($cash === null){
            $this->attributes['cash'] = 0;
        }else{
            $this->attributes['cash'] = $cash;
        }
    }

    public function setChequeAttribute($cheque)
    {
        if($cheque === null){
            $this->attributes['cheque'] = 0;
        }else{
            $this->attributes['cheque'] = $cheque;
        }
    }

    public function setCardAttribute($card)
    {
        if($card === null){
            $this->attributes['card'] = 0;
        }else{
            $this->attributes['card'] = $card;
        }
    }

    public function setCreditAttribute($credit)
    {
        if($credit === null){
            $this->attributes['credit'] = 0;
        }else{
            $this->attributes['credit'] = $credit;
        }
    }

    public function spanishType($type)
    {
        if($type === 'quotation'){
            return 'Cotización';
        }
        if($type === 'purchaseOrder'){
            return 'Orden de compra';
        }
        if($type === 'invoice'){
            return 'Factura';
        }
    }
}
