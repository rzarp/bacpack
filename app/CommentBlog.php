<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentBlog extends Model
{
    protected $guarded = [];
    
    public function childblog()
    {
        return $this->hasMany(CommentBlog::class, 'parent_id');
    }
}
