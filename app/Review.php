<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    //
    protected $fillable=[
        'body','first','second','third','forth','answer','q_number'
    ];
}
