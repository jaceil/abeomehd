<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Hit
 * @package App
 */
class Hit extends Model {

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

    /**
     * @return string
     */
    public function getStatusText()
    {
        switch ($this->status)
        {
            case 0;
            case -4;
                return 'Neutralization';
            case 1:
            case -1:
                return 'Clone Confirmation';
            case -2:
            case 2:
                return 'IC 50 Determination';
            case -3:
            case 3:
                return 'Affinity Determination';
        }
    }
}
