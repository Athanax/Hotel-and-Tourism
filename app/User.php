<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function messages(){
        $this->hasMany('App\Message');
    }

    public function sites(){
        $this->hasMany('App\Site');
    }

    public function role(){
        $this->hasOne('App\Role');
    }

    public function hotels(){
        $this->hasMany('App\Hotel');
    }

    public function notifications(){
        $this->hasMany('App\Notification');
    }

    public function testimonials(){
        $this->hasMany('App\Testimonial');
    }

    public function bookhotels(){
        $this->hasMany('App\Bookhotel');
    }

    public function booksites(){
        $this->hasMany('App\Booksite');
    }

    public function navigations(){
        $this->hasOne('App\Navigation');
    }

    public function conversations(){
        $this->hasMany('App\Conversation');
    }
}
