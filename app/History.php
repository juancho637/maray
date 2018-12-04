<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * @property mixed digestiveSystem
 * @property mixed respiratorySystem
 * @property mixed genitourinarySystem
 * @property mixed nervousSystem
 * @property mixed muscleSystem
 * @property mixed skinAnnexes
 * @property mixed organsSenses
 * @property mixed engagement
 */
class History extends Model
{
    protected $fillable = [
        'engagement_id',
        'diet',
        'motive',
        'current_illness',
        'background_pet',
        'another',
        'general_impression',
        'fc',
        'pa',
        'fr',
        'heartbeat',
        'temperature',
        'weight',
        'square_meter',
        'final_diagnosis',
        'additional_data',
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function engagement()
    {
        return $this->belongsTo(Engagement::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function formulas()
    {
        return $this->hasMany(Formula::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function historyEngagements()
    {
        return $this->hasMany(HistoryEngagement::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function digestiveSystem()
    {
        return $this->hasOne(DigestiveSystem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function respiratorySystem()
    {
        return $this->hasOne(RespiratorySystem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function genitourinarySystem()
    {
        return $this->hasOne(GenitourinarySystem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function nervousSystem()
    {
        return $this->hasOne(NervousSystem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function muscleSystem()
    {
        return $this->hasOne(MuscleSystem::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function skinAnnexes()
    {
        return $this->hasOne(SkinAnnexes::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function organsSenses()
    {
        return $this->hasOne(OrgansSenses::class);
    }

    public function switchModel($name, $property = false)
    {
        switch ($name){
            case 'digestive':
                return ($property) ? $this->digestiveSystem : $this->digestiveSystem();
                break;
            case 'respiratory':
                return ($property) ? $this->respiratorySystem : $this->respiratorySystem();
                break;
            case 'genitourinary':
                return ($property) ? $this->genitourinarySystem : $this->genitourinarySystem();
                break;
            case 'nervous':
                return ($property) ? $this->nervousSystem : $this->nervousSystem();
                break;
            case 'muscle':
                return ($property) ? $this->muscleSystem : $this->muscleSystem();
                break;
            case 'skin_annexes':
                return ($property) ? $this->skinAnnexes : $this->skinAnnexes();
                break;
            case 'organs_senses':
                return ($property) ? $this->organsSenses : $this->organsSenses();
                break;
        }
    }

    public function getProperty($system, $property)
    {
        if($this->switchModel($system)->exists()){
            return $this->switchModel($system, true)->{$property};
        }else{
            return null;
        }
    }
}
