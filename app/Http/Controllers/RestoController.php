<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;

class RestoController extends Controller
{

    // Show list of Restaurant
    function list(){
        $data= Restaurant::all();
        return view("list",compact('data'));
    }

    //Adding the Restaurant
    function add(Request $req){
        $req->validate([
            'name'=>'required|min:4|max:40',
            'email'=>'required|email|unique:restaurants',
            'address'=>'required|min:4|max:100',
        ]);
        $data= new Restaurant;

        // Taking input values
        $data->name=$req->name;
        $data->email=$req->email;
        $data->address=$req->address;
        $data->user_name=$req->user_name;

        //flash session to show alerts
        $req->session()->flash('Add',"Restaurant Added Successfully");

        //Saving all Data in DB
        $data->save();
        return redirect("/list");   
    }

    //Edit Functions here
    function showEdit($id){
        $data = Restaurant::find($id);
        return view('Edit',compact('data'));
    }
    function Edit(Request $req){
        $data = Restaurant::find($req->id);
        $data->name=$req->name;
        $data->email=$req->email;
        $data->address=$req->address;
        $data->save();
        return redirect('/list')->with("edit","Restaurant Updated Successfully");
    }

    //Delete users
    function Delete($id){
        $data =Restaurant::find($id);
        $data->delete();
        return redirect("/list")->with("delete","Restaurant deleted Successfully"); 
    }

    //Searching Restaurants
    public function search(Request $req)
    {
        $req->validate([
            'name'=>'required',
        ]);
        $name = $req->input('name'); // Use input() method to get the 'name' parameter from the request
        $data = Restaurant::where('name', 'like', "%".$name."%")->get();

        if ($data->isEmpty()) {
            return view('search', ['message' => "No Search Found😒😒😒"]);
        } else {
            return view('search',['data'=>$data]);
        }
    }
    function something(){
        $data=$req->input();
        $data->name=$req->name;
        $data->name=$req->name;
        $data->name=$req->name;
        $data->name=$req->name;

        $data->session()->put('name')->get()->toArray()->first();
        return redirect('some',[RestoController::class])
            ->where('name',$data)
            ->toArray();
    }
}
