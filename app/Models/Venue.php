<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venue extends Model
{
    use SoftDeletes;


    protected $dates = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    protected $fillable = [
        'name',
        'address',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
    public function events()
    {
        return $this->hasMany('App\Models\Event', 'venue_id', 'id');
    }
}
