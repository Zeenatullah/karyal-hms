<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomBooking extends Model
{
    
    protected $primaryKey = 'roomId';
    public function customers(){
        return $this->belongsTo('App\Customer', 'customerId');
    }
    public function rooms(){
        return $this->belongsTo('App\Room', 'roomId');
    }
    public function bookedFood(){
        return $this->hasMany('App\Food');
    }
}
