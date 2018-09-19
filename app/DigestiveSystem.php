<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DigestiveSystem extends Model
{
    protected $fillable = [
        'history_id',
        'mouth',
        'stomach',
        'anus',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
