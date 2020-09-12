<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Room;
use App\RoomImages;

class RoomsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $rooms = Room::all();
        return view('admin.rooms.rooms')->with('rooms', $rooms);
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
            'wifi' => 'required',
            'tv' => 'required',
            'taken' => 'required',
            'price' => 'required',
            'numberOfPeople' => 'required',
        ]);
        
        
        
        $room = Room::create($request->only('wifi', 'ac', 'tv', 'taken', 'price', 'numberOfPeople'));

        if($request->hasFile('file')){
            foreach($request->file('file') as $file){
                $roomImage = new RoomImages();
                $fileWithExt = $file->getClientOriginalName();
                
                // Get just filename
                $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);

                // return $filename;
                // Get file ext 
                $extension = $file->getClientOriginalExtension();
                
                // File name to store
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                
                // Store file
                $path = $file->storeAs('public/room_images', $filenameToStore);
                
                // return $filenameToStore;
                $roomImage->roomId = $room->id;
                $roomImage->imageName = $filenameToStore;
                $roomImage->save();
                
            }
        }else{
            $filenameToStore = 'no_image.jpeg';
        }

        return redirect('/dboard/rooms')->with('success', 'Room added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rooms = Room::find($id);
        $roomImages = RoomImages::where('roomId', $id)->paginate(1);

        return view('dashboard.rooms.show')->with('rooms', $rooms)->with('images', $roomImages);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
        * @return \Illuminate\Http\Response
        */
        public function edit($id)
        {
            $rooms = Room::find($id);
            return view('dashboard.rooms.edit')->with('rooms', $rooms);
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
        
        $this->validate($request, [
            'wifi' => 'required',
            'tv' => 'required',
            'taken' => 'required',
            'price' => 'required',
            'numberOfPeople' => 'required',
        ]);
        
        $room = Room::find($id);


        if($request->hasFile('file')){
            foreach($request->file('file') as $file){
                $roomImage = new RoomImages();

                $fileWithExt = $file->getClientOriginalName();
                
                $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);

                // Get file ext 
                $extension = $file->getClientOriginalExtension();
                
                // File name to store
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                
                // Store file
                $path = $file->storeAs('public/room_images', $filenameToStore);
                
                // return $filenameToStore;
                $roomImage->roomId = $room->id;
                $roomImage->imageName = $filenameToStore;
                $roomImage->save();
                
                // print_r($filenameToStore);
            }
        }else{
            $filenameToStore = 'no_image.jpeg';
        }

        $room->wifi = $request->input('wifi');
        $room->ac = $request->input('a/c');
        $room->tv = $request->input('tv');
        $room->taken = $request->input('taken');
        $room->price = $request->input('price');
        $room->numberOfPeople = $request->input('numberOfPeople');
        $room->save();

        return redirect('/dboard/rooms')->with('success', 'Room edited successfully');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $room = Room::find($id);
        
        if($room->cover_image != 'no_image.jpeg'){
            Storage::delete('public/storage/room_images'.$room->tazkira);
        }

        $room->delete();
        return redirect('/dboard/rooms')->with('success', 'The room has been removed');
    }
}
