<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class rates extends Model
{
    public function users(){
        return $this->belongsTo('App\users','users_id');
    }
}
