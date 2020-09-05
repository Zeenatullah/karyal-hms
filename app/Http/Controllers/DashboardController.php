<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Employee;
use App\User;
use App\Room;
use App\foodMenu;
use App\Contact;
use App\RoomBooking;
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
        $totalFees = 0;

        $employees = Employee::all()->count();
        $users = User::all()->count();
        $feedback = Contact::all()->count();
        $rooms = Room::all()->count();
        $fees = RoomBooking::all();
        foreach ($fees as $fee ) {
            $totalFees += $fee->payment;
        }
        // return $totalFees;
        return view('dashboard.index')->with('employees', $employees)->with('users', $users)->with('feedback', $feedback)
                                      ->with('rooms', $rooms)->with('totalFees', $totalFees);
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
        return view('dashboard/Users.index')->with('users', $users);
    }
    public function employees()
    {
        $employees = Employee::orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.Employees.index')->with('employees', $employees);;
    }
    
    public function rooms()
    {
        $rooms = Room::paginate(10);
        return view('dashboard.Rooms.index')->with('rooms', $rooms);
    }
    public function foods()
    {
        
        $foods = FoodMenu::paginate(10);
        return view('dashboard.Foods.index')->with('foods', $foods);
    }
    public function feedbacks()
    {
        // $feedback = Contact::all();
        $feedbacks = Contact::paginate('10');
        // return $feedback;
        return view('dashboard.feedback.index')->with('feedbacks', $feedbacks);
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
