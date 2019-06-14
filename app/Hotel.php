<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    //
    protected $fillable = [
        'user_id',
        'site_id',
        'name',
        'profile_img',
        'cover_img',
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

    public function site(){
        $this->belongsTo('App\Site');
    }

    public function booksites(){
        $this->hasMany('App\Booksite');
    }
}
