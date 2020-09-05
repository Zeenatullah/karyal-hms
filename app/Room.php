<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $casts = ['wifi' => 'boolean'];
    protected $fillable = ['wifi', 'ac', 'tv', 'taken', 'price', 'numberOfPeople'];

    public function roomImages(){
        return $this->hasMany('App\RoomImages');
    }
}


