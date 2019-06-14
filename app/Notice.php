<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    //
    protected $fillable=[
        'notice_type','type_id','head','body','image','status'
    ];
}
