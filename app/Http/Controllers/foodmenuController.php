<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\foodMenu;


class FoodmenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $foodMenu = FoodMenu::all();
        return view('admin.food.foodMenu')->with('foodMenu', $foodMenu);
        // return view('receptionest.foodmenu');
        // return view('admin.food.foodmenu');

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
            'food_drink' => 'required',
            'foodName' => 'required',
            'foodPrice' => 'required',
            'foodImage' => 'required',
        ]);


        if($request->hasFile('foodImage')){

            // Get file name with extension
            $fileWithExt = $request->file('foodImage')->getClientOriginalName();
            
            // Get just filename
            $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);

            // Get file ext 
            $extension = $request->file('foodImage')->getClientOriginalExtension();

            // File name to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Store file
            $path = $request->file('foodImage')->storeAs('public/food_images', $filenameToStore);
        }else{
            $filenameToStore = 'no_image.jpeg';
        }

        $foodMenu = new foodMenu;
        $foodMenu->food_drink = $request->input('food_drink');
        $foodMenu->foodName = $request->input('foodName');
        $foodMenu->foodPrice = $request->input('foodPrice');
        $foodMenu->foodImage= $filenameToStore;
        $foodMenu->save();

        return redirect('dboard/foods')->with('success', 'Food added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $foodMenu = FoodMenu::find($id);
        return view('dashboard.foods.show')->with('foodMenu', $foodMenu);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $foods = foodMenu::find($id); 
        return view('dashboard.foods.edit')->with('foods', $foods);
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
            'food_drink' => 'required',
            'foodName' => 'required',
            'foodPrice' => 'required',
            // 'foodImage' => 'required',
        ]);


        if($request->hasFile('foodImage')){

            // Get file name with extension
            $fileWithExt = $request->file('foodImage')->getClientOriginalName();
            
            // Get just filename
            $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);

            // Get file ext 
            $extension = $request->file('foodImage')->getClientOriginalExtension();

            // File name to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Store file
            $path = $request->file('foodImage')->storeAs('public/food_images', $filenameToStore);
        }else{
            $filenameToStore = 'no_image.jpeg';
        }


        $food = foodMenu::find($id);
        $food->food_drink = $request->input('food_drink');
        $food->foodName = $request->input('foodName');
        $food->foodPrice = $request->input('foodPrice');
        $food->foodImage= $filenameToStore;
        $food->save();
                
        return redirect('/dboard/foods')->with('success', 'The food has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        $food = foodMenu::find($id);

        // if($food->foodImage != 'no_image.jpeg'){
        //     Storage::delete('public/food_images'.$food->foodImage);
        // }

        $food->delete();
        return redirect('/dboard/foods')->with('success', 'The food has been removed');
    }
}
