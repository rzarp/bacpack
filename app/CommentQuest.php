<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CommentQuest extends Model
{
    protected $guarded = [];
    
    public function child()
    {
        return $this->hasMany(CommentQuest::class, 'parent_id');
    }
}
