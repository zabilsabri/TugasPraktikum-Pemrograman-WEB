<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\articleController;


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




Route::group(['middleware' => ['auth', 'hakAkses:member, admin']], function(){
    Route::get('/home', function () {
        return view('member/index');
    });

    Route::get('articles', [articleController::class , 'showArticles']);


    Route::get('/createArticle', function () {
        return view('member/createArticle');
    });   

    Route::post('createArticle', [articleController::class , 'create']);

});

Route::get('', [loginController::class , 'showLogin'])->name('login');
Route::post('loginProcess', [loginController::class , 'login']);
Route::get('/register', [registerController::class , 'showRegister'])->name('register');
Route::post('registerProcess', [registerController::class , 'register']);
Route::get('/logout', [loginController::class , 'logout']);