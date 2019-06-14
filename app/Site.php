<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    //
    protected $fillable = [
        'name',
        'user_id',
        'profile_img',
        'cover_img',
        'type',
        'main_attraction',
        'description',
        'address',
        'location',
        'email',
        'contact',
        'cover_text',
        'latitude',
        'longitude'
    ];

    public function user(){
        $this->belongsTo('App\User');
    }

    public function hotels(){
        $this->hasMany('App\Hotel');
    }

    public function booksites(){
        $this->hasMany('App\Booksite');
    }
}
