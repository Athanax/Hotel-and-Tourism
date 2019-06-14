<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booksite extends Model
{
    //
    protected $fillable = [
        'site_id',
        'user_id',
        'name',
        'country',
        'email',
        'address',
        'phone',
        'age_5-12',
        'age_13-17',
        'age_18-above',
        'duration',
        'amount'
    ];

    public function user(){
        $this->belongsTo('App\User');
    }
    public function site(){
        $this->belongsTo('App\Site');
    }
}
