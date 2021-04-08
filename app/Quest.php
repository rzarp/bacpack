<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Quest extends Model
{
    protected $guarded = [];
    // $timestamps = false;

    
    // setlocale(LC_TIME, 'id_ID');
    // \Carbon\Carbon::setLocale('id');
    // \Carbon\Carbon::now()->formatLocalized("%A, %d %B %Y");
    
    public function comments() 
    {
        return $this->hasMany(CommentQuest::class)->whereNull('parent_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
