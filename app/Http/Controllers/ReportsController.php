<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Storage;
Use Carbon\Carbon;
use App\Employee;
use App\User;
use App\Room;
use App\foodMenu;
use App\Contact;
use App\RoomBooking;
use App\Food;
use App\Customer;
// use App\Contact;


use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function daily(){
        // return date('d');
        $todayRegisteredCustomers = Customer::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->count();
        // return $todayRegisteredCustomers;
        $todayFeedbacks = Contact::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->count();
        $todayBookedRooms = RoomBooking::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->count();
        $todayBills = Food::whereDay('created_at', date('d'))
                            ->whereMonth('created_at', date('m'))
                            ->count();
        // return $todayBills;
        $bookedRooms = RoomBooking::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->get();
        $orderedFoods = Food::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->get();

        $todayRoomsPayment = 0;
        $todayFoodsPayment = 0; 
        
        $freeRooms = Room::where('taken', 0)->count();

        $totalRooms = Room::all()->count();
        
        $totalCustomers = Room::where('taken', 1)->get();
        
        $sumOfCustomers = 0;
        foreach ($totalCustomers as $customer ) {
            $sumOfCustomers += $customer->numberOfPeople;
        }
        // return $sumOfCustomers;
        foreach ($bookedRooms as $rooms ) {
            $todayRoomsPayment += $rooms->payment;
        }

        foreach ($orderedFoods as $bill) {
            $todayFoodsPayment += $bill->totalPrice;
        }

        return view('dashboard.reports.daily')->with('todayRegisteredCustomers', $todayRegisteredCustomers)
                                              ->with('todayFeedbacks', $todayFeedbacks)
                                              ->with('todayBookedRooms', $todayBookedRooms)
                                              ->with('todayBills', $todayBills)
                                              ->with('todayRoomsPayment', $todayRoomsPayment)
                                              ->with('freeRooms', $freeRooms)
                                              ->with('sumOfCustomers', $sumOfCustomers)
                                              ->with('totalRooms', $totalRooms)
                                              ->with('todayFoodsPayment', $todayFoodsPayment);
    }

    public function weekly (){
        $startOfWeek = Carbon::now()->startOfWeek()->format('Y-m-d H:i');
        $endOfWeek = Carbon::now()->endOfWeek()->format('Y-m-d H:i');
        
        $foods = Food::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        
        $todayRegisteredCustomers = Customer::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        $todayFeedbacks = Contact::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        $todayBookedRooms = RoomBooking::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        $todayBills = Food::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        
        $bookedRooms = RoomBooking::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        $orderedFoods = Food::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();

        // return $todayRegisteredCustomers;
        return view('dashboard.reports.weekly')->with('todayRegisteredCustomers', $todayRegisteredCustomers);
        return view('dashboard.reports.weekly');
    }

    

    public function monthly (){
        return 'Monthly';

    }


    public function grand (){
        return 'Grand';

    }


}
