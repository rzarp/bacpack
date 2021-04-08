<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model

{
    protected $guarded = [];

     public function commentsblog() 
    {
        return $this->hasMany(CommentBlog::class)->whereNull('parent_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
