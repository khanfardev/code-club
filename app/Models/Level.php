<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    protected $fillable =[
        'name'
    ];
    public function topics()
    {
        return $this->hasMany('App\Models\Topic','level_id','id');
    }
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson','level_id','id');
    }
    public function ladders()
    {
        return $this->hasMany('App\Models\Ladder','level_id','id');
    }
}
