<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plate extends Model
{

    /**
     * A plate belongs to a mouse.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mouse()
    {
        return $this->belongsTo('App\Mouse');
    }
}
