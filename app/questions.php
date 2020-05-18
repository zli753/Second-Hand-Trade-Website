<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questions extends Model
{
       public function good(){
        return $this->belongsTo('App\goods','goods_id');
    }
}