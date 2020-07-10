<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    protected $fillable = [
        'id','user_id','patrimony','start_date','problem','end_date','solution',
        ];
    
    public function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }
}
