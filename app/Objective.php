<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Objective extends Model
{
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
