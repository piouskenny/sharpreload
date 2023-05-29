<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserAccountController;
use App\Http\Controllers\Buy_Airtime_Data\BuyDataController;
use App\Http\Controllers\Buy_Airtime_Data\BuyAirtimeController;

Route::get('/', HomeController::class)->name('home');


Route::prefix('/user')->group(
    function () {
        Route::get('/account', [UserController::class, 'account'])->name('user.account');
        Route::get('/dashboard', [UserController::class, 'show'])->name('user.dashboard')->middleware('user_auth');
        Route::get('/signup', [UserController::class, 'create'])->name('user.create');
        Route::get('/login', [UserController::class, 'login'])->name('user.login');
        Route::get('/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('user_auth');
        Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
        Route::get('/pin_page', [UserAccountController::class, 'pin_page'])->name('user.pin_page')->middleware('user_auth');
        Route::get('/buy_data', [UserAccountController::class, 'buy_data'])->name('user.buy_data')->middleware('user_auth');
        Route::get('/buy_airtime', [UserAccountController::class, 'buy_airtime'])->name('user.buy_airtime')->middleware('user_auth');

        // Post Requests and Endpount
        Route::post('/store', [UserController::class, 'store'])->name('user.store');
        Route::post('/check', [UserController::class, 'check'])->name('user.check');


        // User Account Route

        Route::get('/deposit', [UserAccountController::class, 'deposit'])->name('user.deposit')->middleware('user_auth');
        Route::get('/UtilitiesTransactions', [UserAccountController::class, 'UtilitiesTransactions'])->name('user.UtilitiesTransactions')->middleware('user_auth');


        // UserAccountPost request

        Route::post('/deposit_request', [UserAccountController::class, 'deposit_request'])->name('user.deposit_request');
        Route::post('/add_bank_account', [UserAccountController::class, 'add_bank_account'])->name('user.add_bank_account')->middleware('user_auth');


        Route::post('/create_user_pin', [UserAccountController::class, 'create_user_pin'])->name('user.create_user_pin')->middleware('user_auth');


        // Data Forms Page Get Request
        Route::get('/mtn_data', [BuyDataController::class, 'buy_mtn_data'])->name('user.buy_mtn_data')->middleware('user_auth');
        Route::get('/airtel_data', [BuyDataController::class, 'buy_airtel_data'])->name('user.buy_airtel_data')->middleware('user_auth');
        Route::get('/glo_data', [BuyDataController::class, 'buy_glo_data'])->name('user.buy_glo_data')->middleware('user_auth');
        Route::get('/9mobile_data', [BuyDataController::class, 'buy_9mobile_data'])->name('user.buy_9mobile_data')->middleware('user_auth');

        // Data Forms Page Post Request
        Route::post('/mtn_data', [BuyDataController::class, 'buy_mtn_data_request'])->name('user.buy_mtn_data_request')->middleware('user_auth');
        Route::post('/airtel_data', [BuyDataController::class, 'buy_airtel_data_request'])->name('user.buy_airtel_data_request')->middleware('user_auth');
        Route::post('/glo_data', [BuyDataController::class, 'buy_glo_data_request'])->name('user.buy_glo_data_request')->middleware('user_auth');
        Route::post('/9mobile_data', [BuyDataController::class, 'buy_9mobile_data_request'])->name('user.buy_9mobile_data_request')->middleware('user_auth');
    }
);





// Route Fall Backs

// Route::get('', [FallbackController::class]);
