<?php

use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\StudentController;
use Illuminate\Http\Request;
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/load-employee-data', [EmployeeController::class, 'loadData']);


Route::get('/my-ip', function (Request $request) {
    $ip = $request->ip(); 

    return "<h1>Your IP Address is: $ip</h1>";
});
// Route::get('/',[CartController::class,'index']);
// Route::post('/addtocart',[CartController::class,'addToCart']);


Route::get('/',[StudentController::class,'index']);
Route::get('/fetch-user',[StudentController::class,'fetchuser']);
Route::get('/add-user',[StudentController::class,'store']);
Route::get('/delete-user/{id}',[StudentController::class,'destroy']);