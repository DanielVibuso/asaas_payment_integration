<?php

use App\Http\Controllers\BillingController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\PaymentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/
Route::prefix('customer')->name('customer.')->controller(CustomerController::class)->group(function () {
    Route::post('/', 'store')->name('customer.store');
    Route::get('/', 'index')->name('customer.index');
});


Route::prefix('payment')->name('payment.')->controller(BillingController::class)->group(function () {
    Route::post('/', 'newCharge')->name('billing.store');
    Route::get('/', 'index')->name('billing.index');
});
