<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    public function pets()
    {
        return $this->hasMany(Pet::class);
    }
}
