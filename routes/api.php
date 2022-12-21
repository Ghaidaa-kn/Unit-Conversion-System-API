<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


//Create product
Route::post('CreateProduct' , [ProductController::class ,'store']);
//Create unit
Route::post('CreateUnit' , [UnitController::class ,'store']);
//Create unit
Route::post('CreateUser' , [UserController::class ,'store']);


//Task One
//1 - Create inventory
Route::post('inventories' , [InventoryController::class ,'store']);
//2 - 3 Get product with its total quantity  && Task Two 3 - with its image path
Route::get('products/{product_id}/{unit_id?}' , [ProductController::class , 'show']);


//Task Two
//1 - Create image
Route::post('images' , [ImageController::class , 'store']);

//2 - Get user with its iamge path
Route::get('users/{user_id}' , [UserController::class , 'show']);


