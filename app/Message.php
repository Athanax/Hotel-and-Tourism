<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //
    protected $fillable = [
        'body','s_id','r_id','s_profile','r_profile','status'
    ];

    public function users(){
        $this->belongsToMany('App\User');
    }
}
