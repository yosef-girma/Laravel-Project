<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //
    protected $guarded = 
    [];

public function projectUser()
{
    return $this->belongsToMany('App\User');
}

}
