<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NervousSystem extends Model
{
    protected $fillable = [
        'history_id',
        'conduct',
        'consciousness_state',
        'previous_members',
        'subsequent_members',
        'pupil',
        'anus_vulva',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
