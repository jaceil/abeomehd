<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = ['title'];

    public function mouse()
    {
        $this->hasMany('App\Mouse');
    }
}
