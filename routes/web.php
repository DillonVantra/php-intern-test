<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('employees', EmployeeController::class);
Route::get('/employees', [EmployeeController::class, 'index']); 
Route::get('/employees/{id}', [EmployeeController::class, 'show']); 
Route::post('/employees/store', [EmployeeController::class, 'store']); 
Route::put('/employees/{id}', [EmployeeController::class, 'update']); 
Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']); 