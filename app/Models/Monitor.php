<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $fillable = [
    'id','user_id','patrimony','brand','model','screen','sn',
    ];
    
    public function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
