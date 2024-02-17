<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;

class UserController extends Controller
{
    function Register(RegisterRequest $req)
    {
        $data = User::create($req->all());   
        return redirect('/login')->with('register',"Successfully Register!! Now You Can Login");
    }

    function login(LoginRequest $request)
    {
        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
        ];
        $user = User::where($credentials)->first();
        if(!empty($user)){
            $request->session()->put('showNav',true);
            $request->session()->put('name',$user['name']);
            return redirect('/list')->with("login","Login Successfully");
        }
        return redirect('login')->with("Error","Invalid Credentials");
    }

    function logout(Request $request){
        if(session()->has('showNav')){
            session()->pull('showNav');
        }
        return redirect('/login')->with('logout',"Logout Successfully!!!!");
    }
}
