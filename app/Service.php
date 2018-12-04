<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'abbreviation',
        'state_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users(){
        return $this->belongsToMany(User::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function detailEngagements(){
        return $this->hasMany(DetailEngagement::class);
    }

    /**
     * Scope a query to only include services of a given abbreviation.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $abbreviation
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAbbreviation($query, $abbreviation)
    {
        return $query->where('abbreviation', 'LIKE', '%'.$abbreviation.'%');
    }
}
