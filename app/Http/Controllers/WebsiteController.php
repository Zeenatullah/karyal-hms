<?php

namespace App\Http\Controllers;

use Log;
use Illuminate\Http\Request;
use App\Room;
use App\Food;
use App\FoodMenu;
use App\RoomImages;

class WebsiteController extends Controller
{
    public function index(){
        Log::info('Homepage visited');

        return view('website.index');
    }

    public function rooms(){
        $rooms = Room::all();
        $images = RoomImages::all();
        $image_id = 0;
        $imagesArray = array( );
        foreach ($images as $image ) {
            if( $image->roomId != $image_id){
                $image_id = $image->roomId;
                array_push($imagesArray, $image->imageName);
                continue;
            }
        }
        return view('website.rooms')->with('rooms', $rooms)->with('imagesArray', $imagesArray);
    }

    
    public function show($id)
    {
        $rooms = Room::find($id);
        $roomImages = RoomImages::where('roomId', $id)->get();
        return view('website.roomImages')->with('rooms', $rooms)->with('images', $roomImages);
    }

   

    public function foods(){
        $foodMenu = FoodMenu::where('food_drink', 'Food')->get();
        return view('website.foods')->with('foodMenu', $foodMenu);
    } 

    public function drinkings(){
        $foodMenu = FoodMenu::where('food_drink', 'Drinkings')->get();
        return view('website.drinkings')->with('foodMenu', $foodMenu);
    } 

    public function foodshow($id)
    {
        return $id;
        $rooms = Room::find($id);
        $roomImages = RoomImages::where('roomId', $id)->paginate(1);
        return view('website.roomImages')->with('rooms', $rooms)->with('images', $roomImages);
    }

    public function services(){
        $services = Room::all();
        return view('website.Services')->with('services', $services);
    }
    public function contact(){
        return view('website.contacts');
    }
}
