<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $fillable = [
    'id','user_id','sector_id','patrimony','brand','model','so','processor','ram','memory','sn',
    ];

    public function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function relSector(){
        return $this->belongsTo('App\Models\Sector', 'sector_id');
    }
    public function relMonitor(){
        return $this->hasMany('App\Models\Monitor');
    }
}
