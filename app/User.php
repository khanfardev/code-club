<?php

namespace App;

use App\Models\Result;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'email', 'password','last_name','student_id'
        ,'collage','university','handel'
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function apiHandelCode($handel)
    {



        $curl_handle=curl_init();
        curl_setopt($curl_handle, CURLOPT_URL,'https://codeforces.com/api/user.info?handles='.$handel);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, 1);
        $query = curl_exec($curl_handle);
        return json_decode($query);
    }
    public function apiStatusHandel($handel)
    {
    return $this->request("https://codeforces.com/api/user.status?handle=".$handel);
    }
    public function request($uri)
    {
        $client = new Client;
        try {
            $response = json_decode($client->request('get', $uri)->getBody()->getContents());
        } catch (ClientException $e) {
            $response = null;
        }

        return $response;
    }
    public function userResults()
    {
        return $this->hasMany(Result::class, 'user_id', 'id');
    }
}
