<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bookhotel extends Model
{
    //
    protected $fillable = [
        'hotel_id',
        'user_id',
        'name',
        'country',
        'email',
        'address',
        'phone',
        'room_no',
        'room_std',
        'duration',
        'amount'
    ];

    public function user(){
        $this->belongsTo('App\User');
    }

    public function hotel(){
        $this->belongsTo('App\Hotel');
    }
}
