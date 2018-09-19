<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrgansSenses extends Model
{
    protected $fillable = [
        'history_id',
        'eyelids',
        'conjunctiva',
        'fluorescein_test',
        'test_rose_bengal',
        'description_cornea',
        'test_shimmer',
        'intraocular_pressure',
        'middle_inner_ear',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
