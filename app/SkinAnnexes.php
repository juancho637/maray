<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SkinAnnexes extends Model
{
    protected $fillable = [
        'history_id',
        'ears',
        'skin',
        'nail',
        'hair',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
