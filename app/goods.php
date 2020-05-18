<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class goods extends Model
{
    public function users(){
        return $this->belongsTo('App\users','users_id');
    }
    public function questions(){
        return $this->hasMany('App\questions');
    }
}
