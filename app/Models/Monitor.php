<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Monitor extends Model
{
    protected $fillable = [
    'id','user_id','sector_id','computer_id','patrimony','brand','model','screen','sn',
    ];
    
    public function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }
    public function relSector(){
        return $this->belongsTo('App\Models\Sector', 'sector_id');
    }
    public function relComputer(){
        return $this->belongsTo('App\Models\Computer', 'computer_id');
    }
}
