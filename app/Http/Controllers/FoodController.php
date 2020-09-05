<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Food;
use App\FoodMenu;
use App\RoomBooking;
use App\Customer;
// use DB;

class FoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $foods = FoodMenu::all();
        $bookedRooms = RoomBooking::all()->sortBy('roomId');
        $bookedFoods = Food::all()->sortBy('bookedRoomId');

        return view('assistant.food.index')->with('foods', $foods)->with('bookedRooms', $bookedRooms)->with('bookedFoods', $bookedFoods);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request, [
            'foodId' => 'required',
            'quantity' => 'required',
            'bookedRoomId' => 'required',
            'time' => 'required',
            'tazkira' => 'image|nullable|max:10000'
        ]);

        $room = RoomBooking::find( $request->input('bookedRoomId'));
        $room->show = '1';
        $room->save();
        // return $room;

        $id = $request->input('foodId');
        $foodsMenu = FoodMenu::find($id);
        $food = new Food;
        $food->bookedRoomId = $request->input('bookedRoomId');
        $food->foodId = $request->input('foodId');
        $food->time = $request->input('time');
        $food->quantity = $request->input('quantity');
        $food->totalPrice = ($request->input('quantity')) * ($foodsMenu->foodPrice);
        $food->show = 1;
        $food->save();
        return redirect('food')->with('success', 'food added successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderedFood = Food::find($id);
        $foods = FoodMenu::all();
        $bookedRooms = RoomBooking::all()->sortBy('roomId');
        return view('assistant.food.edit')->with('orderedFood', $orderedFood)->with('foods', $foods)->with('bookedRooms', $bookedRooms);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $food = Food::find($id);
        $price = $food->foodMenu->foodPrice;
        $food->bookedRoomId = $request->input('bookedRoomId');
        $food->foodId = $request->input('foodId');
        $food->time = $request->input('time');
        $food->quantity = $request->input('quantity');
        $food->totalPrice = ($request->input('quantity')) * $price;
        $food->show = 1;
        // dd($request->all(), $food->totalPrice);
        $food->save();
        return redirect('food')->with('success', 'Customer edited successfully');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $food = Food::find($id);
        $room = RoomBooking::find( $food->bookedRoomId);
        $room->show = '0';
        $room->save();
        // return $food->foodId;
        $foods = Food::where('bookedRoomId', $food->bookedRoomId)
               ->orderBy('BookedRoomId')
               ->get();
            //    return $foods;
        foreach ($foods as $food ) {
            // echo $food->foodId;
            $food->show = 0;
            $food->save();
        }
        $food = Food::find($id);
        $food->delete();
        return redirect('/food')->with('success', 'The food has been removed');
    }
}
