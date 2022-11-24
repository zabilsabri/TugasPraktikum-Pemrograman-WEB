<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\productController;
use App\Http\Controllers\sellerController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\permissionController;
use App\Http\Controllers\sellerPermissionController;



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
    return view('welcome');
});

Route::get('/products', [productController::class, 'showProduct']);
Route::post('saveProductUseQueryBuilder', [productController::class, 'saveProductUseQueryBuilder']);

Route::post('editProductUseQueryBuilder/{id}', [productController::class, 'editProductUseQueryBuilder']);
Route::get('deleteProductUseQueryBuilder/{id}', [productController::class, 'deleteProductUseQueryBuilder']);

Route::get('/sellers', [sellerController::class, 'showSeller']);
Route::post('saveSellerUseQueryBuilder', [sellerController::class, 'saveSellerUseQueryBuilder']);

Route::post('editSellerUseQueryBuilder/{id}', [sellerController::class, 'editSellerUseQueryBuilder']);
Route::get('deleteSellerUseQueryBuilder/{id}', [sellerController::class, 'deleteSellerUseQueryBuilder']);

Route::get('/category', [categoryController::class, 'showCategory']);
Route::post('saveCategoryUseQueryBuilder', [categoryController::class, 'saveCategoryUseQueryBuilder']);

Route::post('editCategoryUseQueryBuilder/{id}', [categoryController::class, 'editCategoryUseQueryBuilder']);
Route::get('deleteCategoryUseQueryBuilder/{id}', [categoryController::class, 'deleteCategoryUseQueryBuilder']);

Route::get('/permission', [permissionController::class, 'showPermission']);
Route::post('savePermissionUseQueryBuilder', [permissionController::class, 'savePermissionUseQueryBuilder']);

Route::post('editPermissionUseQueryBuilder/{id}', [permissionController::class, 'editPermissionUseQueryBuilder']);
Route::get('deletePermissionUseQueryBuilder/{id}', [permissionController::class, 'deletePermissionUseQueryBuilder']);

Route::get('/seller_permission', [sellerPermissionController::class, 'showS_Permission']);
Route::post('saveS_PermissionUseQueryBuilder', [sellerPermissionController::class, 'saveS_PermissionUseQueryBuilder']);

Route::post('editS_PermissionUseQueryBuilder/{id}', [sellerPermissionController::class, 'editS_PermissionUseQueryBuilder']);
Route::get('deleteS_PermissionUseQueryBuilder/{id}', [sellerPermissionController::class, 'deleteS_PermissionUseQueryBuilder']);