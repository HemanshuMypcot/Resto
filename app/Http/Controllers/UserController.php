<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function Register(Request $req)
    {
        $req->validate([
            'name'=>'required|min:4|max:40',
            'username'=>'required|unique:users',
            'password'=>'required|min:4|max:10',
        ]);
        $data = new User;
        $data->name = $req->name;
        $data->username = $req->username;
        $data->password = $req->password;
        $data->save();
        return redirect('/login')->with('register',"Successfully Register!! Now You Can Login");
    }

    function login(Request $request)
    {
        $request->validate([
            'username'=>'required',
            'password'=>'required'
        ]);
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
