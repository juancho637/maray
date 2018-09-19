<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property mixed value
 * @property mixed tax_percentage
 * @property mixed quantity
 */
class Detail extends Model
{
    //use SoftDeletes;

    protected $fillable = [
        'product_id',
        'purchase_order_id',
        'quantity',
        'tax_percentage',
        'value',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product(){
        return $this->belongsTo(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function purchaseOrder(){
        return $this->belongsTo(PurchaseOrder::class);
    }

    public function getUnitValueAttribute()
    {
        return round((($this->value * $this->tax_percentage) / 100) + $this->value);
    }

    public function getTaxesAttribute()
    {
        return round(($this->value * $this->tax_percentage) / 100);
    }

    public function getTotalValueAttribute()
    {
        return round(((($this->value * $this->tax_percentage) / 100) + $this->value) * $this->quantity);
    }
}
