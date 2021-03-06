<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Mouse extends Model
{
    protected $fillable = [
        'project_id',
        'name',
        'antigen',
        'days',
        'gender',
        'adjuvant',
        'titer',
        'harvestDate',
        'injectionDate'
    ];

    protected $dates = ['injectionDate', 'harvestDate'];

    public function setInjectionDateAttribute($date)
    {
        $this->attributes['injectionDate'] = Carbon::createFromFormat('Y-m-d', $date);
    }

    public function setHarvestDateAttribute($date)
    {
        if($date != null) {
            $this->attributes['harvestDate'] = Carbon::createFromFormat('Y-m-d', $date);
        }
    }
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

    /**
     * Check to see if the collection is empty or not.
     * @return bool
     */
    public function hasPlate()
    {
        return (bool) $this->plates()->first();
    }
}
