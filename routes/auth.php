<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\ConfirmablePasswordController;
use App\Http\Controllers\Auth\EmailVerificationNotificationController;
use App\Http\Controllers\Auth\EmailVerificationPromptController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\VerifyEmailController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\FoodCategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\FoodPartyController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\ResturantCategoryController;
use App\Http\Controllers\UserAddressController;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {

    Route::get('register', [RegisteredUserController::class, 'create'])
                ->name('register');

    Route::post('register', [RegisteredUserController::class, 'store']);

    Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->name('login');



    Route::post('login', [AuthenticatedSessionController::class, 'store']);

    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])
                ->name('password.request');

    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])
                ->name('password.email');

    Route::get('reset-password/{token}', [NewPasswordController::class, 'create'])
                ->name('password.reset');

    Route::post('reset-password', [NewPasswordController::class, 'store'])
                ->name('password.update');
});

Route::middleware('auth')->group(function () {
    Route::get('verify-email', [EmailVerificationPromptController::class, '__invoke'])
                ->name('verification.notice');

    Route::get('verify-email/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
                ->middleware(['signed', 'throttle:6,1'])
                ->name('verification.verify');

    Route::post('email/verification-notification', [EmailVerificationNotificationController::class, 'store'])
                ->middleware('throttle:6,1')
                ->name('verification.send');

    Route::get('confirm-password', [ConfirmablePasswordController::class, 'show'])
                ->name('password.confirm');

    Route::post('confirm-password', [ConfirmablePasswordController::class, 'store']);

    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->name('logout');


    Route::resource('/userAddress', UserAddressController::class);
    Route::resource('/restaurantCategory', ResturantCategoryController::class);
    Route::resource('/foodCategory', FoodCategoryController::class);
    Route::resource('/restaurant', RestaurantController::class);
    Route::resource('/food', FoodController::class);
    Route::resource('/discount', DiscountController::class);
    Route::resource('/party',FoodPartyController::class);

    Route::get('/allfood', function(){
        return view('allfood',[
            'foods'=>\App\Models\Food::all()
        ]);
    });

    Route::get('/allrest', function(){
        return view('allrest',[
            'foods'=>\App\Models\Restaurant::all()
        ]);
    });

    Route::get('/fooddes', function(){
        return view('fooddes',[
            'discounts'=>\App\Models\Discount::all()
        ]);
    });
    Route::get('/partydes', function(){
        return view('partydes',[
            'categories'=>\App\Models\FoodParty::all()
        ]);
    });



    Route::get('logout', [AuthenticatedSessionController::class, 'logout'])
        ->name('logout');

});
