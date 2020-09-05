<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('created_at', 'desc')->paginate(5);
        return view('Assistant.customer.customer')->with('customers', $customers);
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
        // return $request->input('province');
        if($request->hasFile('tazkira')){

            // Get file name with extension
            $fileWithExt = $request->file('tazkira')->getClientOriginalName();
            
            // Get just filename
            $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);

            // Get file ext 
            $extension = $request->file('tazkira')->getClientOriginalExtension();

            // File name to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Store file
            $path = $request->file('tazkira')->storeAs('public/Customer_tazkira', $filenameToStore);
        }else{
            $filenameToStore = 'no_image.jpeg';
        }

        $customer = new Customer;
        $customer->name = $request->input('name');
        $customer->lastName = $request->input('lastName');
        $customer->phoneNumber = $request->input('phoneNumber');
        $customer->email = $request->input('email');
        $customer->province = $request->input('province');
        $customer->tazkira = $filenameToStore;
        $customer->save();
        // return $request->all();
        return redirect('customer')->with('success', 'Customer added successfully');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::find($id); 
        return view('Assistant.customer.show')->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $customer = Customer::find($id); 
        return view('Assistant.customer.edit')->with('customer', $customer);
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
        if($request->hasFile('tazkira')){

            // Get file name with extension
            $fileWithExt = $request->file('tazkira')->getClientOriginalName();
            
            // Get just filename
            $filename = pathinfo($fileWithExt, PATHINFO_FILENAME);

            // Get file ext 
            $extension = $request->file('tazkira')->getClientOriginalExtension();

            // File name to store
            $filenameToStore = $filename.'_'.time().'.'.$extension;

            // Store file
            $path = $request->file('tazkira')->storeAs('public/Customer_tazkira', $filenameToStore);
        }else{
            $filenameToStore = 'no_image.jpeg';
        }

        $customer = Customer::find($id); 
        $customer->name = $request->input('name');
        $customer->lastName = $request->input('lastName');
        $customer->phoneNumber = $request->input('phoneNumber');
        $customer->email = $request->input('email');
        $customer->province = $request->input('province');
        $customer->tazkira = $filenameToStore;
        $customer->save();
        return redirect('customer')->with('success', 'Customer edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $customer = Customer::find($id);
        
        if($customer->cover_image != 'no_image.jpeg'){
            Storage::delete('public/storage/tazkiras'.$customer->tazkira);
        }

        $customer->delete();
        return redirect('/customer')->with('success', 'The customer has been removed');
    }
}
