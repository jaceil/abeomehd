<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title'];

    public function mice()
    {
        return $this->hasMany('App\Mouse');
    }
}
