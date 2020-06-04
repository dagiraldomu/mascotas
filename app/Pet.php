<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    //fillable
    public function objective()
    {
        return $this->belongsTo(Objective::class);
    }
    public function type()
    {
        return $this->belongsTo(Type::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function feeds()
    {
        return $this->belongsToMany(Feed::class);
    }
}

