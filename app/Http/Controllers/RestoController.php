<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Restaurant;
use Illuminate\Support\Facades\File;

class RestoController extends Controller
{

    // Show list of Restaurant
    function list(){
        $data= Restaurant::Paginate(2);
        return view("list",compact('data'));
    }

    //Adding the Restaurant
    function add(Request $req){
        $input=$req->all();
        $req->validate([
            'name'=>'required|min:4|max:40',
            'email'=>'required|email|unique:restaurants',
            'address'=>'required|min:4|max:100',
            'file'=>'required|mimes:jpg,jpeg,png,webp'
        ]);
        
        //File operation like getting original name and save in public directory
        $file=$input['file'];
        $newName=$file->getClientOriginalName();
        $input['file']=$newName;
        $file-> move('img/', $newName);

        // Saving data
        $data= Restaurant::create($input);

        //flash session to show alerts
        $req->session()->flash('Add',"Restaurant Added Successfully");

        return redirect("/list");   
    }

    //Edit Functions here
    function showEdit($id){
        $data = Restaurant::find($id);
        return view('Edit',compact('data'));
    }
   
function Edit(Request $req){
    $data = Restaurant::find($req->id);
    
    // Check if a file is uploaded before processing it
    if ($req->hasFile('file')) {
        if (request()->has('file')){
            File::delete(public_path('img/'.$data->file));
        }
        $file = $req->file('file');
        $newName =$file->getClientOriginalName();
        $file->move('img/', $newName);
        $data->file = $newName;
    }

    $data->name = $req->name;
    $data->email = $req->email;
    $data->address = $req->address;
    $data->save();

    return redirect('/list')->with("edit", "Restaurant Updated Successfully");
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
        $data = Restaurant::where('name', 'like', "%".$name."%")
                            ->where('email','like', "%".$req->input('email')."%")
                            ->where('address','like', "%".$req->input('address')."%")
                            ->paginate(4);

        if ($data->isEmpty()) {
            return view('list', ['message' => "No Search Found😒😒😒"]);
        } else {
            return view('list',compact('data'));
        }
    }
    
    
    
}
