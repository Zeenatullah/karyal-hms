<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomImages extends Model
{
    public function rooms(){
        return $this->belongsTo('App\Room', 'roomId');
    }
}
