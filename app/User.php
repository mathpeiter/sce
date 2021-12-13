<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name','cpf','cell','email','password','permission',
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

    public function relComputer(){
        return $this->hasMany('App\Models\Computer', 'user_id');
    }

    public function relMonitor(){
        return $this->hasMany('App\Models\Monitor', 'user_id');
    }

    public function relUsage(){
        return $this->hasMany('App\Models\Usage', 'user_id');
    }

    public function relMaintenance(){
        return $this->hasMany('App\Models\Maintenance', 'user_id');
    }
}
