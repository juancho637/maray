<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespiratorySystem extends Model
{
    protected $fillable = [
        'history_id',
        'breathing_type',
        'vesicular_murmur',
        'rales',
        'wheezing',
        'estridores',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
