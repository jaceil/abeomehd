<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Plate
 * @package App
 */
class Plate extends Model
{
    protected $fillable = [
        'mouse_id',
        'name',
        'plate_type',
        'description',
        'isProcessed'
    ];
    /**
     * A plate belongs to a mouse.
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function mouse()
    {
        return $this->belongsTo('App\Mouse');
    }

    /**
     * A plate can have many photos.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function photos()
    {
        return $this->hasMany('App\Photo');
    }


    /**
     * Create the photo instance in the database.
     * @param Photo $photo
     * @return Model
     */
    public function addPhoto(Photo $photo)
    {
        return $this->photos()->save($photo);
    }
}
