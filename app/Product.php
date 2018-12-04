<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int state_id
 * @property mixed id
 * @property mixed tax_percentage
 * @property mixed value
 * @property mixed name
 * @property mixed unit_value
 */
class Product extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'name',
        'value',
        'tax_percentage',
        'description',
        'type',
        'state_id',
        'area_id',
        'category_id',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category(){
        return $this->belongsTo(Category::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function area(){
        return $this->belongsTo(Area::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function providers(){
        return $this->belongsToMany(Provider::class);
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
    public function stocks(){
        return $this->hasMany(Stock::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formulas(){
        return $this->hasMany(Formula::class);
    }

    /**
     * Scope a query to only include products of a given name.
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeName($query, $name)
    {
        return $query->orWhere('name', 'LIKE', '%'.$name.'%');
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $categoryName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategoryName($query, $categoryName)
    {
        return $query->whereHas('category', function ($query) use ($categoryName) {
            $query->where('name', $categoryName);
        });
    }

    /**
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @param  mixed $areaName
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeAreaName($query, $areaName)
    {
        return $query->whereHas('area', function ($query) use ($areaName) {
            $query->where('name', $areaName);
        });
    }

    public function getNameAttribute($name){
        return ucfirst(strtolower($name));
    }

    public function setNameAttribute($name){
        $this->attributes['name'] =  strtolower($name);
    }

    public function getTypeAttribute($type){
        return ucfirst(strtolower($type));
    }

    public function setTypeAttribute($type){
        $this->attributes['type'] =  strtolower($type);
    }

    public function getUnitValueAttribute()
    {
        return round((($this->value * $this->tax_percentage) / 100) + $this->value);
    }

    public function getTaxesAttribute()
    {
        return round(($this->value * $this->tax_percentage) / 100);
    }
}
