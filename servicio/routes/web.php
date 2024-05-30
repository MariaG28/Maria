<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpleadoController;

Route::get('/', function () {
    return view('auth.login');
});

Route::resource('employee', EmpleadoController::class)->middleware('auth');

/*
Route::get('/empleado',[EmpleadoController::class,'index']);
Route::get('/empleado/create',[EmpleadoController::class,'create']);
Route::get('/empleado/edit',[EmpleadoController::class,'edit']);
Route::get('/empleado/form',[EmpleadoController::class,'form']);
*/

Auth::routes(['register'=>false,'reset'=>false]);

Route::get('/home', [App\Http\Controllers\EmpleadoController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
 
});
