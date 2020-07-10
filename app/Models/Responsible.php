<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    protected $fillable = [
        'id','registration','name','email','sector_id',
        ];

    public function relSector(){
        return $this->hasOne('App\Models\Sector');
    }
}
