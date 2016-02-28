<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    /**
     * Get the modules from the author.
     */
    public function modules()
    {
        return $this->hasMany('App\Entities\Module');
    }
}
