<?php

use App\Http\Controllers\AddressController;
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
//Route::resource('/customer', CustomerController::class);

Route::post('/register', [CustomerController::class, 'register']);
Route::post('/login', [CustomerController::class, 'login']);


// private route for  authenticated customer

Route::group(['middleware' => ['auth:sanctum']], function () {

   // Route::resource('/customer', AddressController::class);
   // Route::get('/customer/search/{name}', [CustomerController::class, 'search']);
    Route::resource('/address', AddressController::class);
  //  Route::delete('/customer', [CustomerController::class,'delete']);
//    Route::get('/id', function () {
//        return auth('sanctum')->user()->id;
//    });

    // Route::get('/customer', [CustomerController::class,'show']);
    Route::put('/editInfo', [CustomerController::class, 'update']); //personal info change
    //  Route::post('/allFood', [CustomerController::class,'allFood']);
    Route::post('/logout', [CustomerController::class, 'logout']);

    Route::get('/restaurant', [CustomerController::class, 'restaurants']);
    Route::get('/restaurant/{id}', [CustomerController::class, 'restaurant']);
    Route::get('restaurant/{id}/food', [CustomerController::class, 'food']);
});

//
//https://www.youtube.com/watch?v=rScUEZPeazY
