<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\RoomBooking;
use App\Food;

class BillController extends Controller
{
    public function edit($id)
    {
        $room = RoomBooking::find( $id);
        $room->show = '0';
        $room->save();
        // return $rooms;

        // return "success";
        $foods = Food::where('bookedRoomId', $id)
               ->orderBy('BookedRoomId')
               ->get();
        foreach ($foods as $food ) {
            // echo $food->foodId;
            $food->show = 0;
            $food->save();
        }
        return redirect('food')->with('success', 'bill submited');

    }
}
