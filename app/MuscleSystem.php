<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MuscleSystem extends Model
{
    protected $fillable = [
        'history_id',
        'previous_members',
        'subsequent_members',
        'spine',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
