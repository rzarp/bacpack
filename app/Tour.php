<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    protected $guarded = [];

     public function commentstour() 
    {
        return $this->hasMany(CommentTour::class)->whereNull('parent_id');
    }
    
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
