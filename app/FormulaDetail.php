<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed formula
 */
class FormulaDetail extends Model
{
    protected $fillable = [
        'formula_id',
        'product_id',
        'presentation',
        'quantity',
        'recommendation',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function formula()
    {
        return $this->belongsTo(Formula::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
