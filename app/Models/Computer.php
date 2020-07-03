<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Computer extends Model
{
    protected $fillable = [
    'id','user_id','patrimony','brand','model','so','processor','ram','memory','sn',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
