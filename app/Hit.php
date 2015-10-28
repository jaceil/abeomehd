<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hit extends Model
{
    protected $fillable = [
        'project_id',
        'mouse_id',
        'plate_id',
        'well',
        'abmno',
        'status',
    ];

    /**
     * An ELISA hit belongs to a project.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('App\Project');
    }

    public function mouse()
    {
        return $this->belongsTo('App\Mouse');
    }
    public function plate()
    {
        return $this->belongsTo('App\Plate');
    }
}
