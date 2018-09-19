<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HistoryEngagement extends Model
{
    protected $fillable = [
        'history_id',
        'engagement_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history(){
        return $this->belongsTo(History::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function engagement()
    {
        return $this->belongsTo(Engagement::class);
    }
}
