<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    //
    protected $fillable = [
        'user_id','test_id','test_type','user_name','body','status'
    ];

    public function user(){
        $this->belongsTo('App\User');
    }

    public function hotel(){
        $this->belongsTo('App\Hotel');
    }

    public function site(){
        $this->belongsTo('App\Site');
    }
}
