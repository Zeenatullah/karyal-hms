<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthorizationController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    
    public function __invoke() {
        $user = auth()->user();
        $redirect = null;
        dd('testing');
        switch ($user->user_type) {
            case 'Receptionist':
                $redirect = redirect('/service');
                break;
            case 'Admin':
                $redirect = redirect('/home');
                break;
        }
        return $redirect;
    }
}
