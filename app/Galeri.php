<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $guarded = [];

     public function commentsgaleri() 
    {
        return $this->hasMany(CommentGaleri::class)->whereNull('parent_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
