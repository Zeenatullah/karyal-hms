<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $users = User::orderBy('created_at', 'desc')->paginate(5);
        // return view('dashboard.users.index')->with('users', $users);

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
        
        $user = new User();
        $user->name = $request->input('name');
        $user->user_type = $request->input('user_type');
        $user->email = $request->input('email');          
        $user->password = Hash::make($request->input('password'));

        
        $user->save();

        return redirect('/dboard/users')->with('success', 'Room added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = User::find($id); 
        return view('dashboard.users.show')->with('post', $post);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = User::find($id); 
        return view('admin.users.edit')->with('post', $post);
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
            'name' => 'required',
            'email' => 'required',
            'user_type' => 'required',
            'password' => 'required',
        ]);
            
        
        $post = User::find($id);
        $post->name = $request->input('name');
        $post->email = $request->input('email');
        $post->user_type = $request->input('user_type');
        $post->password = Hash::make($request->input('password'));
        // @password =   'password' => Hash::make($request->newPassword) // Hashing passwords
        $post->save();

        return redirect("dashboard.users.index")->with('success', "users successfully changed");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = User::find($id);
        
        // if($post->cover_image != 'no_image.jpeg'){
        //     Storage::delete('public//'.$post->);
        // }

        $post->delete();
        return redirect('/dboard/users')->with('success', 'The employee has been removed');
    }
}
