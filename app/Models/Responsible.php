<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Responsible extends Model
{
    protected $fillable = [
        'id','registration','name','email',
        ];

    public function relSector(){
        return $this->hasMany('App\Models\Sector');
    }
}
