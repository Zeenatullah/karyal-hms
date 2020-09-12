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
        $todayRegisteredCustomers = Customer::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->count();
        $todayBookedRooms = RoomBooking::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->count();
        $todayBills = Food::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->count();
        $bookedRooms = RoomBooking::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->get();
        $orderedFoods = Food::whereDay('created_at', date('d'))->whereMonth('created_at', date('m'))->get();
        $freeRooms = Room::where('taken', 0)->count();
        $totalRooms = Room::all()->count();


        $todayRoomsPayment = 0;
        $todayFoodsPayment = 0; 
        
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
        
        $thisWeekRegisteredCustomers = Customer::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $thisWeekBills = Food::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $thisWeekBookedRooms = RoomBooking::whereBetween('created_at', [$startOfWeek, $endOfWeek])->count();
        $freeRooms = Room::where('taken', 0)->count();
        $totalRooms = Room::all()->count();
        
        
        $totalCustomers = Room::where('taken', 1)->get();
        $ُthisWeekBookedRooms = RoomBooking::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        $thisWeekOrderedFoods = Food::whereBetween('created_at', [$startOfWeek, $endOfWeek])->get();
        
        
        $sumOfCustomers    = 0;
        $thisWeekRoomsPayment = 0;
        $thisWeekFoodsPayment = 0; 
        
        foreach ($totalCustomers as $customer ) {   $sumOfCustomers += $customer->numberOfPeople;  }
        foreach ($ُthisWeekBookedRooms as $rooms ) { $thisWeekRoomsPayment += $rooms->payment; }
        foreach ($thisWeekOrderedFoods as $bill) { $thisWeekFoodsPayment += $bill->totalPrice; }

        // return 'success';
        return view('dashboard.reports.weekly')->with('thisWeekRegisteredCustomers', $thisWeekRegisteredCustomers)
                                              ->with('thisWeekBills', $thisWeekBills)
                                              ->with('thisWeekBookedRooms', $thisWeekBookedRooms)
                                              ->with('freeRooms', $freeRooms)
                                              ->with('totalRooms', $totalRooms)
                                              ->with('sumOfCustomers', $sumOfCustomers)
                                              ->with('thisWeekRoomsPayment', $thisWeekRoomsPayment)
                                              ->with('thisWeekFoodsPayment', $thisWeekFoodsPayment);
    }

    

    public function monthly (){
        
        $thisMonthRegisteredCustomers = Customer::whereMonth('created_at', date('m'))->count();
        // return $thisMonthRegisteredCustomers;
        $thisMonthBills = Food::whereMonth('created_at', date('m'))->count();
        $thisMonthBookedRooms = RoomBooking::whereMonth('created_at', date('m'))->count();
        $freeRooms = Room::where('taken', 0)->count();
        $totalRooms = Room::all()->count();
        
        
        $totalCustomers = Room::where('taken', 1)->get();
        $ُthisMonthBookedRooms = RoomBooking::whereMonth('created_at', date('m'))->get();
        $thisMonthOrderedFoods = Food::whereMonth('created_at', date('m'))->get();
        
        
        $sumOfCustomers    = 0;
        $thisMonthRoomsPayment = 0;
        $thisMonthFoodsPayment = 0; 
        
        foreach ($totalCustomers as $customer ) {   $sumOfCustomers += $customer->numberOfPeople;  }
        foreach ($ُthisMonthBookedRooms as $rooms ) { $thisMonthRoomsPayment += $rooms->payment; }
        foreach ($thisMonthOrderedFoods as $bill) { $thisMonthFoodsPayment += $bill->totalPrice; }

        return view('dashboard.reports.monthly')->with('thisMonthRegisteredCustomers', $thisMonthRegisteredCustomers)
                                              ->with('thisMonthBills', $thisMonthBills)
                                              ->with('thisMonthBookedRooms', $thisMonthBookedRooms)
                                              ->with('freeRooms', $freeRooms)
                                              ->with('totalRooms', $totalRooms)
                                              ->with('sumOfCustomers', $sumOfCustomers)
                                              ->with('thisMonthRoomsPayment', $thisMonthRoomsPayment)
                                              ->with('thisMonthFoodsPayment', $thisMonthFoodsPayment);

    }


    public function grand(){
                
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

    public function register(){
        return "test";
    }
    
}
