<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    public function pets()
    {
        return $this->belongsToMany(Pet::class);
    }
}
