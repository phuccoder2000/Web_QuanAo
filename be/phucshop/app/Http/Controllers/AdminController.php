<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class AdminController extends Controller
{
    public function loginAdmin()
    {
//        dd(bcrypt('123456'));
        if(auth() ->check()){
            return redirect() ->to('home');
        }
        return View('login');
    }

    public function postloginAdmin(Request $request)
    {

        $remember = $request->has('remember_me') ? true : false;
        if (auth()->attempt([
            'email' => $request->email,
            'password' => $request->password
        ], $remember)) {
            return redirect() ->to('home');
        }
    }
}
