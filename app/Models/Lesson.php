<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{

    protected $fillable=['name','description','body','topic_id','level_id','image','user_id','slug'];
    public function topic()
    {
        return $this->belongsTo('App\Models\Topic','topic_id','id');

    }

    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
}
