<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    /**
     * Get the author that owns the module.
     */
    public function author()
    {
        return $this->belongsTo('App\Entities\Author');
    }
}
