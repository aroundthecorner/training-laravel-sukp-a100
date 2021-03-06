<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laratrust\Traits\LaratrustUserTrait;

class User extends Authenticatable
{
    use LaratrustUserTrait;
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

    public function tasks()
    {
        if($this->hasRole('administrator')) {
            return $this->hasMany('App\Task');
        }

        if($this->hasRole('staff')) {
           return $this->hasMany('App\Task','assignee_id'); 
        }
    }

    public function posts()
    {
        return $this->hasMany('App\Post');
    }
}























