<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function register(Request $request){
        $user = new User;
        $user->name =  $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->save();

        return redirect('/');
    }

    public function login()
    {
        return view('auth.login');
    }

    public function postlogin(Request $request){
    	if (Auth::attempt($request->only('email', 'password'))) {
    		return redirect('/dashboard');
    	}
    	return redirect('/login');
    }

    public function logout(){
    	Auth::logout();
    	return redirect('/login');
    }
}