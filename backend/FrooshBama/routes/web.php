<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get("/login" , [LoginController::class , "login"])->name('login');
Route::post("/login" , [LoginController::class , "login"])->name("login");
Route::post("/get/confirm/code" , [LoginController::class , "sendConfirmCode"])->name("confirm.code");