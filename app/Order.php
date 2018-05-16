<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //Each order belong to One user
    public function user() {
        return $this->belongsTo('App\User');
    }
}
