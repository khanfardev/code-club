<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Topic extends Model
{
    protected $fillable=['name','image','description','user_id','level_id','slug'];
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function lessons()
    {
        return $this->hasMany('App\Models\Lesson');
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
