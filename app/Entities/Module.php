<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    protected $fillable = ['github_id'];
    
    /**
     * Get the author that owns the module.
     */
    public function author()
    {
        return $this->belongsTo('App\Entities\Author');
    }

    public function setRequireAttribute($value) {
        $this->attributes['require'] = serialize($value);
    }

    public function getRequireAttribute($value) {
        return unserialize($value);
    }
}
