<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = [
        'id','name',
        ];
    
    public function relUsage(){
        return $this->hasMany('App\Usage');
    }
}
