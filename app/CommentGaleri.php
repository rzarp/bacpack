<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentGaleri extends Model
{
    protected $guarded = [];
    
    public function childgaleri()
    {
        return $this->hasMany(CommentGaleri::class, 'parent_id');
    }
}
