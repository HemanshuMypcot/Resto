<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Restaurant;
use App\Http\Requests\AddEmployeeRequest;

class EmployeeController extends Controller
{
    function list()
    {
        $data = Restaurant::all();
        return view('AddEmp', compact('data'));
    }
    function list1()
    {
        $data = Restaurant::all();
        return view('EmpEdit', compact('data'));
    }
    function add(AddEmployeeRequest $req)
    {
        // Validate the request data
        $Data = $req->all();

        // Saving data
        $data = Employee::create($Data);

        // Flash session to show alerts
        $req->session()->flash('AddEmp', 'Employee Added Successfully');

        return redirect("/listEmp");
    }


    function showEmployeeDetails()
    {
        // Assuming you have a route parameter for the employee ID

        $data['data'] = Employee::with('restaurant')->get();
        return view('listEmp', $data);
    }

    function showEmployeeName($id)
    {
        $data['data'] = Restaurant::with('employee')->find($id);
        echo "<pre>";
        print_r($data['data']['employee']->toArray());
        exit;
        // return view('list', $data);
        // dd($data['data']);
        // return view('showEmp', $data);
        // return response()->json($data['data']->toArray());

    }

    function showEdit($id)
    {
        $data = Employee::find($id);
        return view('EmpEdit', compact('data'));
    }

    // function showOption($id){
    //     $data= Restaurant::find($id);
    //     return view('EmpEdit', compact('data'));
    // }

    // public function showRestaurants()
    // {
    //     $restaurants = Restaurant::all(); // Fetch all restaurants from the database

    //     return view('EmpEdit', compact('restaurants'));
    // }

    public function showOption($id)
    {
        $data = Employee::find($id);
        $restaurants = Restaurant::all();

        return view('EmpEdit', compact('data', 'restaurants'));
    }

    public function editEmp(Request $req){
        // print_r($req->id);exit;
        $data = Employee::find($req->id);
        $data->name = $req->name;
        $data->email = $req->email;
        $data->address = $req->address;
        $data->resto_id= $req->resto_id;
        $data->save();
        return redirect('/listEmp')->with("editEmp", "Employee Updated Successfully");
    }

    public function DeleteEmp($id){
        $data = Employee::find($id);
        $data->delete();
        return redirect("listEmp")->with("EmpDelete","Employee Deleted Successfully");
    }
}
