<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Usage extends Model
{
    protected $fillable = [
        'id','user_id','sector_id','patrimony','start_date',
        ];
    
    public function relUser(){
        return $this->belongsTo('App\User', 'user_id');
    }

    public function relSector(){
        return $this->belongsTo('App\Models\Sector', 'sector_id');
    }
}
