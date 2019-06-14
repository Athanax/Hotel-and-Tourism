<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    //
    protected $fillable = [
        'name','email','subject','s_id','r_id','message','status','type','type_id'
    ];

    public function users(){
        $this->belongsToMany('App\User');
    }
}
