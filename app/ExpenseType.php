<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExpenseType extends Model
{
    protected $fillable = [
        'state_id',
        'name',
        'description',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function expenses()
    {
        return $this->hasMany(Expense::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state()
    {
        return $this->belongsTo(State::class);
    }
}
