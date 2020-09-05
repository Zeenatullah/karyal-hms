<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public function foodmenu(){
        return $this->belongsTo('App\FoodMenu', 'foodId');
    }
    
    public function bookedRooms(){
        return $this->belongsTo('App\RoomBooking', 'bookedRoomId');
    }
}
