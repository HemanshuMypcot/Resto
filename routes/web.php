<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestoController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmployeeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::get("/home",[RestoController::class,'index']);

// Listing of Data
Route::view("/list","list");
Route::get("/list",[RestoController::class,'list']);

// Add Restaurant data
Route::post("/add",[RestoController::class,'add']);

//Edit
Route::post("/edit",[RestoController::class,'Edit']);

//Register user
Route::view("register",'Register');
Route::post("register",[UserController::class,'Register']);

//Login User
Route::view("/login","Login");
Route::post('/login',[UserController::class,'login']);

//logout user
Route::get('logout',[UserController::class,'logout']);

//lising page
Route::group(['middleware'=>['protectedPage']],function(){
    //Add Restaurants
    Route::view("/add","Add"); 

    //Delete the data
    Route::get("delete/{id}",[RestoController::class,"Delete"]);

    //Editing the data
    Route::get("edit/{id}",[RestoController::class,'showEdit']);

    //Add Employeee
    Route::view('addEmp','AddEmp');
    Route::get('addEmp',[EmployeeController::class,'list']);

});

//Search
Route::post('/search', [RestoController::class, 'search']);

//multiple image upload
Route::view('/image','multiple');

// Add Employee
Route::post('addEmp',[EmployeeController::class,'add']);

Route::view('listEmp','listEmp');
Route::get('listEmp',[EmployeeController::class,'showEmployeeDetails']);


Route::get('users/{id}',[EmployeeController::class,'showEmployeeName']);