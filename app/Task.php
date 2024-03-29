<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //
    protected $guarded = 
    [];
    
    public function user()
        {
            return $this->belongsToMany('App\User');
        }
    
    public function project()
    {
        return $this->belongsTo('App\Project');
    }
    public function company()
    {
      return $this->belongsTo('App\Company');

    }
    public function comments()
    {
      return   $this->morphMany('App\Comment','commentable');
    }
}
