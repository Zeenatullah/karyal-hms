<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $this->validate($request, [
            'wifi' => 'required',
            'tv' => 'required',
            'taken' => 'required',
            'price' => 'required',
            'numberOfPeople' => 'required',
        ]);
        
        $room->wifi = $request->input('wifi');
        $room->ac = $request->input('a/c');
        $room->tv = $request->input('tv');
        $room->taken = $request->input('taken');
        $room->price = $request->input('price');
        $room->numberOfPeople = $request->input('numberOfPeople');
        $room->save();

        return redirect('/dboard/rooms')->with('success', 'Room added successfully');
    }
}
