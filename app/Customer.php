<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function rooms(){
        return $this->hasMany('App\RoomBooking');
    }
}
