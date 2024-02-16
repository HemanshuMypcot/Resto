<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Restaurant;
use App\Http\Requests\AddEmployeeRequest;
class EmployeeController extends Controller
{
    function list(){
        $data= Restaurant::all();
        return view('AddEmp',compact('data'));
    }
    function add(AddEmployeeRequest $req){
        // Validate the request data
        $Data=$req->all();
    
        // Saving data
        $data = Employee::create($Data);
    
        // Flash session to show alerts
        $req->session()->flash('AddEmp', 'Employee Added Successfully');
    
        return redirect("/listEmp");  
    }


    function showEmployeeDetails() {
        // Assuming you have a route parameter for the employee ID
    
        $data['data'] = Employee::with('restaurant')->get();
        return view('listEmp',$data);
    }

    function showEmployeeName($id){
        $data['data'] = Restaurant::with('employee')->find($id);
        echo "<pre>";
        print_r($data['data']->toArray());exit;
        // return view('list', $data);
    }
}
