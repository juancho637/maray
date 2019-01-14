<?php

namespace App;

use App\Traits\DatesTranslator;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

/**
 * @property mixed state_id
 */
class Balance extends Model
{
    use DatesTranslator;

    protected $fillable = [
        'user_id',
        'state_id',
        'delivery_balance_to',

        'system_global_cash',
        'system_global_cheque',
        'system_global_card',
        'system_global_total',

        'system_real_cash',
        'system_real_cheque',
        'system_real_card',
        'system_real_expenditure',
        'system_real_total',

        'system_invoice_cash',
        'system_invoice_cheque',
        'system_invoice_card',
        'system_invoice_total',

        'manual_cash',
        'manual_cheque',
        'manual_card',
        'manual_expenditure',
        'manual_total',

        'manual_invoice_cash',
        'manual_invoice_cheque',
        'manual_invoice_card',
        'manual_invoice_total',
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

    public function setManualInvoiceCashAttribute($value){
        if ($value === null){
            $this->attributes['manual_invoice_cash'] =  0;
        }else{
            $this->attributes['manual_invoice_cash'] = $value;
        }
    }

    public function setManualInvoiceChequeAttribute($value){
        if ($value === null){
            $this->attributes['manual_invoice_cheque'] =  0;
        }else{
            $this->attributes['manual_invoice_cheque'] = $value;
        }
    }

    public function setManualInvoiceCardAttribute($value){
        if ($value === null){
            $this->attributes['manual_invoice_card'] =  0;
        }else{
            $this->attributes['manual_invoice_card'] = $value;
        }
    }

    public function setManualInvoiceTotalAttribute($value){
        if ($value === null){
            $this->attributes['manual_invoice_total'] =  0;
        }else{
            $this->attributes['manual_invoice_total'] = $value;
        }
    }

    public function setManualCashAttribute($value){
        if ($value === null){
            $this->attributes['manual_cash'] =  0;
        }else{
            $this->attributes['manual_cash'] = $value;
        }
    }

    public function setManualChequeAttribute($value){
        if ($value === null){
            $this->attributes['manual_cheque'] =  0;
        }else{
            $this->attributes['manual_cheque'] = $value;
        }
    }

    public function setManualCardAttribute($value){
        if ($value === null){
            $this->attributes['manual_card'] =  0;
        }else{
            $this->attributes['manual_card'] = $value;
        }
    }

    public function setManualExpenditureAttribute($value){
        if ($value === null){
            $this->attributes['manual_expenditure'] =  0;
        }else{
            $this->attributes['manual_expenditure'] = $value;
        }
    }

    public function setManualTotalAttribute($value){
        if ($value === null){
            $this->attributes['manual_total'] =  0;
        }else{
            $this->attributes['manual_total'] = $value;
        }
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
