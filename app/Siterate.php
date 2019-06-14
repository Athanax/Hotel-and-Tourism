<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siterate extends Model
{
    //
       //
       protected $fillable = [
        'name','site_id','age_5-12','age_13-17','age_18-above'
    ];

    public function site(){
        $this->belongsTo('App\Site');
    }
}
