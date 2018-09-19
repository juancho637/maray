<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GenitourinarySystem extends Model
{
    protected $fillable = [
        'history_id',
        'penis_vulva',
        'testicles',
        'prostate',
        'mammary_gland',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
