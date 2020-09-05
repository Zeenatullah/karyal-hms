<?php

namespace App\Http\Controllers;

use App\RoomBooking;
use App\Customer;
use App\Room;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class RoomBookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   

        // $test = Customer::find(1)->rooms->customerId;
        // return $test;

        // $test1 = RoomBooking::find(2)->customers;
        // $test1 = RoomBooking::find(1)->customers->name;
        // $test1 = RoomBooking::find(1)->rooms->price;

        // return $test1;


        $customers = Customer::all();
        $rooms = Room::all();
        $roomBooking = RoomBooking::paginate(5);
        // return;
        return view('assistant.roombooking.index')->with('customers', $customers)->with('rooms', $rooms)->with('roomBooking', $roomBooking);

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
        $this->validate($request, [
            'customerId' => 'required',
            'roomId' => 'required',
            'startDate' => 'required',
            'endDate' => 'required',
        ]);

        $roomId = $request->input('roomId');
        $room = Room::find($roomId);
        $room->taken = 1;
        $room->save();
        
        $booking = new RoomBooking;
        $booking->customerId = $request->input('customerId');
        $booking->startDate = $request->input('startDate');
        $booking->endDate = $request->input('endDate');
        $booking->roomId = $request->input('roomId');
        $booking->payment = $request->input('payment');
        $booking->show = 0;
        $booking->save();
        return redirect('roombooking')->with('success', 'Room added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\RoomBooking  $roomBooking
     * @return \Illuminate\Http\Response
     */
    public function show(RoomBooking $roomBooking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\RoomBooking  $roomBooking
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // return "success";
        $roomBooking = RoomBooking::find($id); 
        return view('assistant.roomBooking.edit')->with('roomBooking', $roomBooking);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\RoomBooking  $roomBooking
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $roomBooking = RoomBooking::find($id); 
        // dd($id, $roomBooking);
        $roomBooking->startDate = $request->input('startDate');
        $roomBooking->endDate = $request->input('endDate');
        $roomBooking->payment = $request->input('payment');
        $roomBooking->save();
        return redirect('roombooking')->with('success', 'Booking edited successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\RoomBooking  $roomBooking
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $room = Room::find($id);
        $room->taken = 0;
        $room->save();
        
        $roomBooking = RoomBooking::find($id);
        // return $roomBooking;
        
        $roomBooking->delete();
        return redirect('/roombooking')->with('success', 'The room has been deleted successfully');

    }
}
