<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentTour extends Model
{
    protected $guarded = [];
    
    public function childtour()
    {
        return $this->hasMany(CommentTour::class, 'parent_id');
    }
}
