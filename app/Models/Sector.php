<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [
        'id','name','responsible_id',
        ];
    
    public function relUsage(){
        return $this->hasMany('App\Usage');
    }

    public function relReponsible(){
        return $this->belongsTo('App\Models\Responsible', 'responsible_id');
    }
}
