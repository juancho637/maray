<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed history
 */
class Formula extends Model
{
    protected $fillable = [
        'history_id',
        'observations',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->belongsTo(History::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formulaDetails()
    {
        return $this->hasMany(FormulaDetail::class);
    }
}
