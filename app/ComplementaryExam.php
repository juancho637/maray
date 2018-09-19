<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ComplementaryExam extends Model
{
    protected $fillable = [
        'history_id',
        'name',
        'additional_data',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
