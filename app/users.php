<?php

namespace App;

use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;

class users extends Model implements Authenticatable
{
    use \Illuminate\Auth\Authenticatable;
    public function good(){
        return $this->hasMany('App\goods');
    }
    public function rate(){
        return $this->hasMany('App\rates');
    }
}
