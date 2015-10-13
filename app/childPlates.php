<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class childPlates extends Model
{
    protected $fillable = [
        'name',
        'description',
        'plate_type'
    ];

    public function parent()
    {
        return $this->belongsToMany('App\Plate');
    }
}
