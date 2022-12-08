<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\articleController;
use App\Http\Controllers\categoryController;


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

    Route::get('/createArticle', [articleController::class , 'showCreateArticles']);

    Route::post('createArticle', [articleController::class , 'create']);

    Route::post('createCategory', [categoryController::class , 'create']);

    Route::get('articleDetail/{id}/{id2}', [articleController::class , 'showArticleDetail']);

    Route::post('editCategory/{id}', [categoryController::class, 'edit']);

    Route::get('category', [categoryController::class , 'showCategory']);

    Route::get('deleteCategory/{id}', [categoryController::class, 'delete']);

});

Route::get('', [loginController::class , 'showLogin'])->name('login');
Route::post('loginProcess', [loginController::class , 'login']);
Route::get('/register', [registerController::class , 'showRegister'])->name('register');
Route::post('registerProcess', [registerController::class , 'register']);
Route::get('/logout', [loginController::class , 'logout']);