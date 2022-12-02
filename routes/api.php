<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

//public route for customers

Route::post('/register', [CustomerController::class, 'register']);
Route::post('/login', [CustomerController::class, 'login']);


// private route for  authenticated customer

Route::group(['middleware' => ['auth:sanctum']], function () {


   //  Route::get('/customer/search/{name}', [CustomerController::class, 'seaarch']);

    Route::resource('/address', AddressController::class);



    Route::put('/editInfo', [CustomerController::class, 'update']); //personal info change

    Route::post('/logout', [CustomerController::class, 'logout']);

    Route::get('/restaurant', [CustomerController::class, 'restaurants']);
    Route::get('/restaurant/{id}', [CustomerController::class, 'restaurant']);
    Route::get('restaurant/{id}/food', [CustomerController::class, 'food']);

    Route::get('/carts',[CartController::class,'carts']);
    Route::get('/carts/{id}',[CartController::class,'cart']);
    Route::post('/carts/add',[CartController::class,'store']);
    Route::patch('/carts/add',[CartController::class,'update']);
    Route::post('/carts/{id}/pay',[CartController::class,'pay']);



    Route::get('/near',[AddressController::class,'near']);
    Route::resource('/comments',CommentController::class);
});


//https://www.youtube.com/watch?v=rScUEZPeazY
