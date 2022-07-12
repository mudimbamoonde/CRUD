<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;


Route::get('/', function () {
    return view('welcome');
});


Route::get('/homepage', [CrudController::class,'index'])->name("index");
Route::get('/contactus', [CrudController::class,'contactUs'])->name("contactUs");
Route::post('/contactus', [CrudController::class,'contactDB']);
Route::get('/customer', [CrudController::class,'customer'])->name("customer");

// Route::resource("/customer",CrudController::class);
Route::get('/customer/{id}/edit', [CrudController::class,'customerEdit']);
Route::post('/customer/{id}/edit', [CrudController::class,'customerUpdate']);
Route::get('/customer/{id}/delete', [CrudController::class,'customerDelete']);





Auth::routes();
// Auth::routes([
//     'register' => false,
//     'login' => false,
// ]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
