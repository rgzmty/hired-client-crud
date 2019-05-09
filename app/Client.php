<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    public function occupation () {
        return $this->hasOne('App\Occupation');
    }
}