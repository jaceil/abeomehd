<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['name'];

    /**
     * A Project has many mice.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mice()
    {
        return $this->hasMany('App\Mouse');
    }

    /**
     * Check to see if there are any mice associated to a project.
     * @return bool
     */
    public function hasMice()
    {
        return (bool) $this->mice()->first();
    }

    /**
     * A project has many hits.
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function hits()
    {
        return $this->hasMany('App\Hit');
    }
}
