<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int state_id
 */
class Category extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'abbreviation',
        'state_id',
        'area_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(){
        return $this->hasMany(Product::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(){
        return $this->belongsTo(Area::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state(){
        return $this->belongsTo(State::class);
    }

    public function getNameAttribute($name){
        return ucfirst(strtolower($name));
    }

    public function setNameAttribute($name){
        $this->attributes['name'] =  strtolower($name);
    }
}
