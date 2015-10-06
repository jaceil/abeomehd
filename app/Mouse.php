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

    public function setInjectionDateAttribute($date)
    {
        $this->attributes['injectionDate'] = Carbon::parse($date);
    }

    public function setHarvestDateAttribute($date)
    {
        $this->attributes['harvestDate'] = Carbon::parse($date);
    }
    public function project()
    {
        $this->belongsTo('App\Project');
    }
}
