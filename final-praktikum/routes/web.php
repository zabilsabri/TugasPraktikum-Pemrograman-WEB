<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;

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

Route::get('/home', function () {
    return view('index');
});

Route::get('/articles', function () {
    return view('article');
});

Route::get('/login', [loginController::class , 'showLogin']);
Route::post('loginProcess', [loginController::class , 'login']);
Route::get('/register', [registerController::class , 'showRegister']);
Route::post('registerProcess', [registerController::class , 'register']);