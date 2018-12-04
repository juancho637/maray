<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicExam extends Model
{
    protected $fillable = [
        'history_id',
        'name',
        'additional_data',
        'additional_data->*',
    ];

    /**
     * Get the history that owns the clinic exam.
     */
    public function history()
    {
        return $this->belongsTo(History::class);
    }
}
