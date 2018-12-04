<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Area extends Model
{
    //use SoftDeletes;

    protected $fillable = [
        'name',
        'description',
        'state_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function categories(){
        return $this->hasMany(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function state(){
        return $this->belongsTo(State::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products(){
        return $this->hasMany(Product::class);
    }

    public function setNameAttribute($name){
        $this->attributes['name'] =  strtolower($name);
    }

    public function getNameAttribute($name){
        return ucfirst($name);
    }
}
