<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ladder extends Model
{
    protected $fillable = ['name','description','user_id','level_id','slug'];
    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
    public function users()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function apiHandelCode()
    {
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,'https://codeforces.com/api/problemset.problems');
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        $query = curl_exec($curl_handle);
        return json_decode($query);
    }
    public function apiProblemHandel($handel)
    {
        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,'https://codeforces.com/api/user.status?handle='.$handel);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        $query = curl_exec($curl_handle);
        return json_decode($query);
    }


}
