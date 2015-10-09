<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    protected $fillable = [
        'name',
        'antigen',
        'gender',
        'adjuvant',
        'titer',
        'harvestDate',
        'injectionDate'
    ];

//    protected $dates = ['injectionDate', 'harvestDate'];
//
//    public function setInjectionDateAttribute($date)
//    {
//        $this->attributes['injectionDate'] = Carbon::parse($date);
//    }
//
//    public function setHarvestDateAttribute($date)
//    {
//        $this->attributes['harvestDate'] = Carbon::parse($date);
//    }
    /**
     * A mouse belongs to a project.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    /**
     * A mouse has many plates.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plates()
    {
        return $this->hasMany('App\Plate');
    }
}
