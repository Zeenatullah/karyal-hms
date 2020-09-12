<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Employee;
use App\User;
use App\Room;
use App\FoodMenu;
use App\Contact;
use App\RoomBooking;
use App\Customer;
use App\Food;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $totalRegisteredCustomers = Customer::all()->count();
        $totalBills = Food::all()->count();
        $totalBookedRooms = RoomBooking::all()->count();
        $freeRooms = Room::where('taken', 0)->count();
        $totalRooms = Room::all()->count();
        
        
        $totalCustomers = Room::where('taken', 1)->get();
        $ُtotalBookedRooms = RoomBooking::all();
        $totalOrderedFoods = Food::all();
        
        
        $sumOfCustomers    = 0;
        $totalRoomsPayment = 0;
        $totalFoodsPayment = 0; 
        
        foreach ($totalCustomers as $customer ) {   $sumOfCustomers += $customer->numberOfPeople;  }
        foreach ($ُtotalBookedRooms as $rooms ) { $totalRoomsPayment += $rooms->payment; }
        foreach ($totalOrderedFoods as $bill) { $totalFoodsPayment += $bill->totalPrice; }

        return view('dashboard.reports.grand')->with('totalRegisteredCustomers', $totalRegisteredCustomers)
                                              ->with('totalBills', $totalBills)
                                              ->with('totalBookedRooms', $totalBookedRooms)
                                              ->with('freeRooms', $freeRooms)
                                              ->with('totalRooms', $totalRooms)
                                              ->with('sumOfCustomers', $sumOfCustomers)
                                              ->with('totalRoomsPayment', $totalRoomsPayment)
                                              ->with('totalFoodsPayment', $totalFoodsPayment);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function users()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        // dd($users);
        return view('dashboard.users.index')->with('users', $users);
    }
    public function employees()
    {
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.employees.index')->with('employees', $employees);
    }
    
    public function rooms()
    {
        $rooms = Room::paginate(10);
        return view('dashboard.rooms.index')->with('rooms', $rooms);
    }
    public function foods()
    {
        
        $foods = FoodMenu::paginate(10);
        return view('dashboard.foods.index')->with('foods', $foods);
    }
    public function feedbacks()
    {
        // $feedback = Contact::all();
        $count = Contact::all()->count();
        $feedbacks = Contact::paginate('10');
        // return $count;
        return view('dashboard.feedback.index')->with('feedbacks', $feedbacks)-> with('count', $count);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
